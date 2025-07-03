<?php

namespace App\Http\Controllers\Api;

use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    public function obtener_productos(Request $request)
    {
        if ($request->filled('id')) {
            $producto = Producto::with('marca', 'tipo')->find($request->input('id'));

            if (!$producto) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Producto no encontrado',
                    'data' => null
                ], 404);
            }

            $data = $producto;
            $message = 'Producto obtenido correctamente';
        } else {
            $data = Producto::with('marca', 'tipo')->get();
            $message = 'Lista de productos obtenida correctamente';
        }

        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ]);
    }


    public function crear_producto(Request $request)
    {
        // dd($request->all());

        $marca = Marca::where('id', $request->input('brand_id'))->where('active', true)->first();

        if (!$marca) {
            return response()->json(['status' => 'error', 'message' => 'La marca no existe o está inactiva'], 404);
        }

        $producto = Producto::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'active' => $request->input('active') ? true : false,
            'stock' => $request->input('stock'),
            'sku' => $request->input('sku'),
            'brand_id' => $marca->id,
            'type_id' => $request->input('type_id'),
        ]);

        $respuesta = [
            'producto_id' => $producto->id,
        ];

        return response()->json(['status' => 'success', 'message' => 'Producto creado correctamente', 'data' => $respuesta]);
    }

    public function eliminar_producto(Request $request)
    {
        $id = $request->input('id');
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        if (!$producto['active']) {
            return response()->json(['message' => 'error', 'message' => 'No se puede eliminar un producto que está activo'], 409);
        }

        $stock = intval($producto['stock']);

        if ($stock > 0) {
            return response()->json(['status' => 'error', 'message' => 'No se puede eliminar un producto con stock'], 409);
        }

        $producto->delete();

        return response()->json(['message' => 'Producto eliminado']);
    }

    public function modificar_producto(Request $request)
    {
        $producto = Producto::find($request->input('id'));

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'stock' => $request->input('stock'),
            'sku' => $request->input('sku'),
            'active' => $request->input('active') ? true : false,
            'brand_id' => $request->input('brand_id'),
            'type_id' => $request->input('type_id'),
        ]);

        return response()->json($producto);
    }
}
