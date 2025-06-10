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
        if ($request->has('id')) {
            $id = $request->input('id');
            $producto = Producto::with('marca')->find($id);
        } else {
            $producto = Producto::with('marca')->get();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Lista de productos obtenida correctamente',
            'data' => $producto
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
