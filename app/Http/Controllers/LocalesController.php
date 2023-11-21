<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class LocalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(Local::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $local = Local::create([
            'nombre' => $request->nombreNegocio,
            'ubicacion' => $request->ubicacion,
            'telefono' => $request->telefono,
            'categoria_id' => $request->categoria,
            'subcategoria_id' => $request->subcategoria,
            'encargado_id' => $request->encargado,
            'representante_legal_id' => $request->representanteLegal,
            'status' => $request->status
        ]);

        return response()->json(['message' => 'Local creado con éxito', 'local' => $local], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $local = Local::find($id);
        if ($local) {
            return response()->json($local);
        } else {
            return response()->json(['message' => 'Local no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $local = Local::find($id);

        if ($local) {
            $local->update([
                'nombre_de_negocio' => $request->nombre_de_negocio,
                'ubicacion' => $request->ubicacion,
                'telefono' => $request->telefono,
                'representante_legal' => $request->representante_legal,
                'categoria' => $request->categoria,
                'subcategoria' => $request->subcategoria
            ]);

            return response()->json(['message' => 'Local actualizado con éxito', 'local' => $local], 200);
        } else {
            return response()->json(['message' => 'Local no encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $local = Local::find($id);

        if ($local) {
            $local->delete();
            return response()->json(['message' => 'Local eliminado con éxito'], 200);
        } else {
            return response()->json(['message' => 'Local no encontrado'], 404);
        }
    }
}
