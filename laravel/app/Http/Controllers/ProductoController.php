<?php

namespace App\Http\Controllers;

use App\Services\ferremaService;
use Illuminate\Http\Request;

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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'sku' => 'nullable|string|max:100',
            'brand_id' => 'required|integer',
            'type_id' => 'required|integer',
        ]);

        $data['active'] = $request->has('active') ? 1 : 0;

        $response = $this->ferremaService->post('producto/crear', $data);

        if (!$response || !isset($response['data']['producto_id'])) {
            return back()->withErrors('Ocurrió un error al crear el producto');
        }

        // Registrar historial de precio
        $this->registrarHistorialPrecio($response['data']['producto_id'], $data['price'], 'Producto creado');

        return redirect()->route('admin.producto.index')->with('success', 'Producto creado correctamente');
    }


    public function show($id)
    {
        // dd('llegue al create');
        $response = $this->ferremaService->get('producto/obtener', ['id' => $id]);
        $historialResponse = $this->ferremaService->get("precio-historico/listar/{$id}");

        if (!$response || !isset($response['data'])) {
            return back()->withErrors('No se pudo obtener el producto.');
        }

        $producto = $response['data'];
        $historial = $historialResponse['data'] ?? [];

        return view('pages.admin.producto.show', compact('producto', 'historial'));
    }

    public function edit($id)
    {
        $response = $this->ferremaService->get('producto/obtener', ['id' => $id]);
        // dd($response);
        $producto = $response['data'];

        $responseMarcas = $this->ferremaService->get('marca/obtener');
        $marcas = $responseMarcas['data'];

        $responseTipos = $this->ferremaService->get('tipo-producto/obtener');
        $tipos = $responseTipos['data'];

        // dd($producto);
        return view('pages.admin.producto.edit', compact('producto', 'marcas', 'tipos'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'sku' => 'nullable|string|max:100',
            'brand_id' => 'required|integer',
            'type_id' => 'required|integer',
        ]);

        $data['active'] = $request->has('active') ? 1 : 0;
        $data['id'] = $id;

        $response = $this->ferremaService->put('producto/modificar', $data);

        if ($response && isset($response['id'])) {
            $this->registrarHistorialPrecio($id, $data['price'], 'Producto actualizado');
            return redirect()->route('admin.producto.index')->with('success', 'Producto actualizado correctamente');
        } else {
            return back()->withErrors('Ocurrió un error al actualizar el producto')->withInput();
        }
    }

    public function destroy($id)
    {
        $response = $this->ferremaService->delete('producto/eliminar', ['id' => $id]);

        if (!$response) {
            return back()->withErrors('No se pudo eliminar el producto.');
        }

        return redirect()->route('admin.producto.index')->with('sucess', 'Producto eliminado correctamente.');
    }

    private function registrarHistorialPrecio($productId, $price, $reason = null)
    {
        $payload = [
            'product_id' => $productId,
            'price' => $price,
            'reason' => $reason,
        ];

        $this->ferremaService->post('precio-historico/crear', $payload);
    }
}
