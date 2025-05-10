<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProducto;

class TipoProductoController extends Controller
{
    public function obtener_tipoprod()
    {
        $tipos = TipoProducto::all();

        return response()->json(['status' => 'success', 'data' => $tipos]);
    }

    public function store(Request $request)
    {
        $request->validate(['nombre'=>'required|string|max:255', 'active' => 'required|boolean',]);


        $tipo = TipoProducto::create($request->only('nombre', 'status'));

        return response()->json(['status' => 'success', 'message' => 'Tipo de producto creado correctamente.', 'data' => $tipo]);
    }

    public function update(Request $request, $id)
    {
        $tipo = TipoProducto::find($id);

        if (!$tipo) {
            return response()->json(['status' => 'error', 'message' => 'Tipo no encontrado'], 404);
        }

        $request->validate(['nombre' => 'sometimes|required|string|max:255', 'active' => 'sometimes|required|boolean',]);

        $tipo->update($request->only('nombre', 'active'));
        return response()->json(['status' => 'success', 'message' => 'Tipo de producto actualizado correctamente.', 'data' => $tipo]);
    }

    public function destroy($id)
    {
        $tipo = TipoProducto::find($id);

        if (!$tipo) {
            return response()->json(['status' => 'error', 'message' => 'Tipo no encontrado'], 404);
        }

        $tipo->delete();
        return response()->json(['status' => 'success', 'message' => 'Tipo eliminado']);
    }

    public function index()
    {
        $tipos = TipoProducto::all();
        return view('components.tipos.index', compact('tipos'));
    }
}
