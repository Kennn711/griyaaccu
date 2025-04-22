<?php

namespace App\Http\Controllers;

use App\Models\Accu;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('type.index', [
            "type" => Type::withCount('accu')->get()
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
            'type_name' => "required|min:3|max:50|unique:App\Models\Type,type_name"
        ]);

        Type::create($validation);

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
            'type_name' => 'required|min:3|max:50|unique:App\Models\Type,type_name'
        ]);

        Type::findOrFail($id)->update($validation);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $accuAlreadyExist = Accu::where('type_id', $id)->exists();

        if ($accuAlreadyExist) {
            return redirect()->back();
        }

        Type::findOrFail($id)->delete();

        return redirect()->back();
    }
}
