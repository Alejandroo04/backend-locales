<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(Subcategory::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Subcategory = Subcategory::create([
            'name' => $request->name,
            'rol_id' => $request->rol_id
        ]);

        return response()->json(['message' => 'Subcategory creado con éxito', 'Subcategory' => $Subcategory], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Subcategory::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Subcategory = Subcategory::find($id);

        $Subcategory->update([
            'name' => $request->name,
            'rol_id' => $request->rol_id
        ]);

        return response()->json(['message' => 'Subcategory actualizado con éxito', 'Subcategory' => $Subcategory], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Subcategory = Subcategory::find($id);

        $Subcategory->delete();

        return response()->json(['message' => 'Subcategory Eliminado con éxito'], 200);
    }
}
