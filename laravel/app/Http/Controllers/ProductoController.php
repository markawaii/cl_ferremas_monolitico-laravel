<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function obtener_productos() {
        return 'Llegamos a la función';
    }
    public function obtener_producto($id) {
        return "Producto con ID: " . $id;
    }

    public function store(Request $request) {
        $producto = Producto::create([
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
        ]);

        return response()->json($producto, 201);
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        $producto->delete();

        return response()->json(['mensaje' => 'Producto eliminado'], 200);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        if(!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        $producto->update([
            'nombre' => $request ->input('nombre'),
            'precio' => $request ->input('precio'),
        ]);

        return response()->json($producto, 200);
    }
}
