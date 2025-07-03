<?php

namespace App\Http\Controllers\Api;

use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipoProductoController extends Controller
{
    public function obtener_tipoprod(Request $request)
    {
        if ($request->filled('id')) {
            $tipo = TipoProducto::find($request->input('id'));

            if (!$tipo) {
                return response()->json(['status' => 'error', 'message' => 'Tipo de producto no encontrado', 'data' => null], 404);
            }

            return response()->json(['status' => 'success', 'data' => $tipo]);
        }

        $tipos = TipoProducto::all();
        return response()->json(['status' => 'success', 'data' => $tipos]);
    }

    public function crear_tipoprod(Request $request)
    {
        $request->validate(['nombre' => 'required|string|max:255', 'active' => 'required|boolean',]);


        $tipo = TipoProducto::create($request->only('nombre', 'active'));

        return response()->json(['status' => 'success', 'message' => 'Tipo de producto creado correctamente.', 'data' => $tipo]);
    }

    public function modificar_tipoprod(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'active' => 'required|boolean',
            ]);

            $tipo = TipoProducto::find($id);

            if (!$tipo) {
                return response()->json(['status' => 'error', 'message' => 'Tipo no encontrado'], 404);
            }

            $tipo->update($request->only('nombre', 'active'));

            return response()->json([
                'status' => 'success',
                'message' => 'Tipo de producto actualizado correctamente.',
                'data' => $tipo,
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Excepción detectada',], 500);
        }
    }

    public function eliminar_tipoprod(Request $request, $id)
    {
        $tipo = TipoProducto::find($id);

        $productos = Producto::where('type_id', $tipo['id'])->count();

        //Si la cantidad de productos es mayor a 0, retornamos mensaje de error indicando que no se puede borrar una marca con un producto asignado

        if($productos > 0) {
            return response()->json(['status' => 'error', 'message' => 'No se puede eliminar el tipo de producto asignado a un producto'], 409);
        }

        if (!$tipo) {
            return response()->json(['status' => 'error', 'message' => 'Tipo no encontrado'], 404);
        }

        $tipo->delete();
        return response()->json(['status' => 'success', 'message' => 'Tipo eliminado correctamente.']);
    }
}
