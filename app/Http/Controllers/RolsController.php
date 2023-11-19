<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(Rol::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol = Rol::create([
            'name' => $request->name
        ]);

        return response()->json(['message' => 'Rol creado con éxito', 'rol' => $rol], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Rol::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rol = Rol::find($id);

        $rol->update([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return response()->json(['message' => 'Rol actualizado con éxito', 'rol' => $rol], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol = Rol::find($id);

        $rol->delete();

        return response()->json(['message' => 'Rol Eliminado con éxito'], 200);
    }
}
