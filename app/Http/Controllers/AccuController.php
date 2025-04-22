<?php

namespace App\Http\Controllers;

use App\Models\Accu;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('accu/index', [
            'accu' => Accu::with('type')->get(),
            'type' => Type::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'accu_name' => [
                'required',
                'min:2',
                'max:50',
                Rule::unique((new \App\Models\Accu)->getTable())->where(function ($query) use ($request) {
                    return $query->where('type_id', $request->type_id);
                }),
            ],
            'type_id' => 'required',
        ]);

        Accu::create($validation);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'accu_name' => [
                'required',
                'min:2',
                'max:50',
                Rule::unique((new \App\Models\Accu)->getTable())->where(function ($query) use ($request) {
                    return $query->where('type_id', $request->type_id);
                }),
            ],
            'type_id' => 'required',
        ]);

        Accu::findOrFail($id)->update($validation);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Accu::findOrFail($id)->delete();

        return redirect()->back();
    }
}
