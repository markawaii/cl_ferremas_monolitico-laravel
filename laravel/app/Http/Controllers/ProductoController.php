<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Marca;
use App\Models\TipoProducto;
use App\Services\ferremaService;
use GuzzleHttp\Promise\Create;

class ProductoController extends Controller
{
    protected $ferremaService;

    public function __construct(ferremaService $ferremaService)
    {
        $this->ferremaService = $ferremaService;
    }

    public function index()
    {
        $response = $this->ferremaService->get('producto/obtener');

        if (!$response || !isset($response['data'])) {
            return back()->withErrors('Error al obtener productos.');
        }

        $productos = $response['data'];

        return view('pages.admin.producto.index', compact('productos'));
    }

    public function create()
    {
        $consultarMarcas = $this->ferremaService->get('marca/obtener');
        $marcas = $consultarMarcas['data'];
        $consultarTipos = $this->ferremaService->get('tipo-producto/obtener');
        $tipos = $consultarTipos['data'];
        return view('pages.admin.producto.create', compact('marcas', 'tipos'));
    }


    public function store(Request $request)
    {

        $data = $request->all();
        $response = $this->ferremaService->post('producto/crear', $data);
        return redirect()->route('admin.producto.index')->with('success', 'Producto creado correctamente.');
    }

    // public function show(){
    //     dd('llegue al create');
    // }

    public function edit($id)
    {
        $data = ['id' => $id];

        $response = $this->ferremaService->get('producto/obtener', $data);
        dd($response);
        $producto = $response['producto'];

        return view('pages.admin.producto.edit', compact('producto', 'marcas'));
    }

    // public function update(){
    //     dd('llegue al create');
    // }

    // public function delete(){
    //     dd('llegue al create');

    // }

    public function obtener_productos(Request $request)
    {
        //1. Verificar si viene un json

        //2. Si viene un json, verificar si tiene un id

        //3. Si tiene un id, que solo retorne el producto al cual pertenece ese id.

        $producto = Producto::with('marca')->get();

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
