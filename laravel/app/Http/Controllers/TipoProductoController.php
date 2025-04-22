<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProducto;

class TipoProductoController extends Controller
{
    public function obtener_tipoprod()
    {
        dd('Se llegó a la función');
        $tipos = TipoProducto::all();

        return response()->json(['status' => 'success', 'data' => $tipos]);
    }

    public function store(Request $request)
    {
        dd('Se llegó a la store');
        $tipo = TipoProducto::create($request->all());

        return response()->json(['status' => 'success', 'message' => 'Tipo creado', 'data' => $tipo]);
    }

    public function update(Request $request, $id)
    {
        dd('Se llegó a la update');
        $tipo = TipoProducto::find($id);

        if (!$tipo) {
            return response()->json(['status' => 'error', 'message' => 'Tipo no encontrado'], 404);
        }

        $tipo->update($request->all());
        return response()->json(['status' => 'success', 'message' => 'Tipo actualizado', 'data' => $tipo]);
    }

    public function destroy($id)
    {
        dd('Se llegó a destroy');
        $tipo = TipoProducto::find($id);

        if (!$tipo) {
            return response()->json(['status' => 'error', 'message' => 'Tipo no encontrado'], 404);
        }

        $tipo->delete();
        return response()->json(['status' => 'success', 'message' => 'Tipo eliminado']);
    }
}
