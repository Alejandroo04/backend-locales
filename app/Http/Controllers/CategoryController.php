<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return response()->json(Category::with('subcategories')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol = Category::create([
            'name' => $request->name
        ]);

        return response()->json(['message' => 'Categoria creada con éxito', 'Categoria' => $rol], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Category::with('subcategories')->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rol = Category::find($id);

        $rol->update([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return response()->json(['message' => 'Categoria actualizada con éxito', 'rol' => $rol], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol = Category::find($id);

        $rol->delete();

        return response()->json(['message' => 'Categoria Eliminada con éxito'], 200);
    }
}
