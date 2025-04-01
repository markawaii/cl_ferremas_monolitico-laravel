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
        $id = $request->input('id');
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto);
    }

    public function store(Request $request) {
        $producto = Producto::create([
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
        ]);

        return response()->json($producto, 201);
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
