<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Marca;
use App\Models\TipoProducto;
use GuzzleHttp\Promise\Create;

class ProductoController extends Controller
{
    public function index()
    {
        return view('pages.producto.index');
    }

    // public function create(){
    //     dd('llegue al create');
    // }

    // public function store(){
    //     dd('llegue al create');
    // }

    // public function show(){
    //     dd('llegue al create');
    // }

    // public function edit(){
    //     dd('llegue al create');
    // }

    // public function update(){
    //     dd('llegue al create');
    // }

    // public function delete(){
    //     dd('llegue al create');

    // }

    public function obtener_productos()
    {
        $producto = Producto::with('marca')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Lista de productos obtenida correctamente',
            'data' => $producto
        ]);
    }

    public function store(Request $request)
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

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->delete();

        return response()->json(['message' => 'Producto eliminado']);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

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
