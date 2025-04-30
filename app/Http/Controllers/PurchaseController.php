<?php

namespace App\Http\Controllers;

use App\Models\Accu;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        return view('purchase.index', [
            'purchase' => Purchase::with(['purchasedetail', 'accu', 'type'])->get(),
            'accu' => Accu::with('type')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'purchase_date' => 'required|date',
            'due_date' => 'required|date',
            'accu_id' => 'required|array',
            'quantity' => 'required|array',
            'price' => 'required|array',
            'total_discount' => 'required|numeric',
            'subtotal_ppn' => 'required|numeric',
        ]);

        try {
            DB::beginTransaction();

            // Hitung Subtotal
            $subtotal = 0;
            foreach ($validation['accu_id'] as $index => $accuId) {
                $subtotal += $validation['price'][$index] * $validation['quantity'][$index];
            }

            // Hitung Diskon * PPN
            $discountPercent = $validation['total_discount'];
            $ppnPercent = $validation['subtotal_ppn'];

            $discountAmount = $subtotal * ($discountPercent / 100);
            $afterDiscount = $subtotal - $discountAmount;
            $ppnAmount = $afterDiscount * ($ppnPercent / 100);
            $grandTotal = $afterDiscount + $ppnAmount;

            $purchase = Purchase::create([
                'purchase_code' => 'GriyaAccu-' . rand(1000, 9999),
                'purchase_date' => $validation['purchase_date'],
                'due_date' => $validation['due_date'],
                'total_discount' => $discountPercent,
                'subtotal_ppn' => $ppnPercent,
                'total' => $grandTotal,
                'payment_date' => NULL,
                'purchase_status' => 'pending'
            ]);

            // Looping add data ke Tabel Purchase Detail
            foreach ($validation['accu_id'] as $index => $accu_id) {
                PurchaseDetail::create([
                    'purchase_id' => $purchase->id, // Relasikan dengan purchase yang baru dibuat
                    'accu_id' => $accu_id,
                    'quantity' => $validation['quantity'][$index],
                    'price' => $validation['price'][$index],
                ]);
            }

            DB::commit();

            return redirect()->route('purchase.index')->with('success', 'Pembelian berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }
}
