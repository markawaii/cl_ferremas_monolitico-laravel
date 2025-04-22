<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function store(Request $request)
    {
        $marca = Marca::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'active' => $request->input('active') ? true : false,
        ]);

        $respuesta = [
            'brand_id' => $marca->id,
        ];

        return response()->json(['status' => 'success','message' => 'Marca creada correctamente', 'data' => $respuesta]);
    }

    public function destroy($id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json(['status' => 'error', 'message' => 'Marca no encontrada'], 404);
        }

        $marca -> delete();

        return response()->json(['status' => 'success','message' => 'Marca eliminada correctamente']);
    }

    public function update (Request $request, $id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json(['status' => 'error', 'message' => 'Marca no encontrada'], 404);
        }

        $marca->update ([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'active' => $request->input('active') ? true : false,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Marca actualizada correctamente', 'data' => $marca]);
    }
}
