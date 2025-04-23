<?php

namespace App\Http\Controllers;

use App\Models\Accu;
use App\Models\Purchase;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        return view('purchase.index', [
            'purchase' => Purchase::class,
            'accu' => Accu::with('type')->get()
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());

        $validation = $request->validate([
            'accu_id' => 'required',
            'quantity' => 'required|integer'
        ]);

        Purchase::create([
            'accu_id' => $request->accu_id,
            'purchase_date' => Transaction::purchase_date(),
            'due_date' => Transaction::purchase_date(),
        ]);
    }
}
