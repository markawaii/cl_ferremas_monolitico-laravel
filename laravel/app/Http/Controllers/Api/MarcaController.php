<?php

namespace App\Http\Controllers\Api;

use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarcaController extends Controller
{
    public function obtener_marcas(Request $request)
    {
        if ($request->has('id')) {
            $id = $request->input('id');
            $marca = Marca::find($id);

            if (!$marca) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Marca no encontrada',
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Marca obtenida correctamente',
                'data' => $marca,
            ]);
        }

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
            'active' => $request->input('active'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Marca creada correctamente',
            'data' => ['brand_id' => $marca->id]
        ]);
    }


    public function modificar_marca(Request $request)
    {
        try {
            $id = $request->input('id');
            $marca = Marca::find($id);

            if (!$marca) {
                return response()->json(['status' => 'error', 'message' => 'Marca no encontrada']);
            }

            $marca->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'active' => $request->input('active'),
            ]);

            return response()->json(['status' => 'success', 'message' => 'Marca actualizada correctamente', 'data' => $marca]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Excepción detectada',], 500);
        }
    }

    public function eliminar_marca(Request $request)
    {
        $id = $request->input('id');
        $marca = Marca::find($id);

        //Si la marca está siendo ocupada por un producto, no se puede eliminar

        $productos = Producto::where('brand_id', $marca['id'])->count();

        //Si la cantidad de productos es mayor a 0, retornamos mensaje de error indicando que no se puede borrar una marca con un producto asignado

        if($productos > 0) {
            return response()->json(['status' => 'error', 'message' => 'No se puede eliminar una marca asignada a un producto'], 409);
        }

        if (!$marca) {
            return response()->json(['status' => 'error', 'message' => 'Marca no encontrada'], 404);
        }

        $marca->delete();

        return response()->json(['status' => 'success', 'message' => 'Marca eliminada correctamente']);
    }
}
