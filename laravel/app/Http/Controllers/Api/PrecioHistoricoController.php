<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PrecioHistorico;
use Illuminate\Http\Request;

class PrecioHistoricoController extends Controller
{
    public function crear_historico_precio(Request $request) {
        $data = $request->validate([
            'product_id' => 'required|exists:productos,id',
            'price' => 'required|numeric',
            'reason' => 'nullable|string|max:255',
        ]);

        $precio = PrecioHistorico::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Registro de precio historico creado correctamente',
            'data' => $precio,
        ]);
    }

    public function listar_precio($id)
    {
        $historical = PrecioHistorico::where('product_id', $id)->orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Historial de precios obtenido correctamente.',
            'data' => $historical,
        ]);
    }
}
