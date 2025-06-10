<?php

namespace App\Http\Controllers\Api;

use App\Models\Marca;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarcaController extends Controller
{
    public function obtener_marcas()
    {
        $marcas = Marca::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Lista de marcas obtenida correctamente',
            'data' => $marcas
        ]);
    }
    public function crear_marca(Request $request)
    {
        $marca = Marca::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'active' => $request->input('active') ? true : false,
        ]);

        $respuesta = [
            'brand_id' => $marca->id,
        ];

        return response()->json(['status' => 'success', 'message' => 'Marca creada correctamente', 'data' => $respuesta]);
    }

    public function modificar_marca(Request $request, $id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json(['status' => 'error', 'message' => 'Marca no encontrada'], 404);
        }

        $marca->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'active' => $request->input('active') ? true : false,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Marca actualizada correctamente', 'data' => $marca]);
    }

    public function eliminar_marca($id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json(['status' => 'error', 'message' => 'Marca no encontrada'], 404);
        }

        $marca->delete();

        return response()->json(['status' => 'success', 'message' => 'Marca eliminada correctamente']);
    }
}
