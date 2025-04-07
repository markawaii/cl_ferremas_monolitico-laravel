<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function obtener_productos() {
        return 'Llegamos a la función';
    }
    public function obtener_producto(Request $request) {
        $apikey = $request->header('apikey');
        if ($apikey !== 'poto') {
            return response()->json(['status' => 'error', 'message' => 'El APIKey no coincide']);
    }


        // dd($request->all());
        $producto = Producto::find($request->id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $producto]);
    }

    public function store(Request $request) {
        // dd($request->all());
        $producto = Producto::create([
            'name' => $request->input('nombre'),
            'price' => $request->input('precio'),
            'description' => $request->input('description'),
            'active' => $request->input('active') ? true:false,
            'stock' => $request->input('stock'),
            'sku' => $request->input('sku')
        ]);

        $respuesta = [
            'producto_id' => $producto->id,
        ];

        return response()->json(['status' => 'success', 'message' => 'Producto creado correctamente' , 'data' => $respuesta]);
    }

    public function destroy(Request $request) {
        $id = $request->input('id');
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        $producto->delete();

        return response()->json(['mensaje'=> 'Producto eliminado']);
    }

    public function update (Request $request) {
        $id = $request->input('id');
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        $producto -> update ([
            'nombre' => $request -> input ('nombre'),
            'precio' => $request ->input ('precio'),
        ]);

        return response()->json($producto);
    }
}
