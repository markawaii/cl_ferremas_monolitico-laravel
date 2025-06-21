<?php

namespace App\Http\Controllers;

use App\Services\ferremaService;
use Illuminate\Http\Request;

class TipoProductoController extends Controller
{
    protected $ferremaService;

    public function __construct(ferremaService $ferremaService)
    {
        $this->ferremaService = $ferremaService;
    }

    public function index()
    {
        $response = $this->ferremaService->get('tipo-producto/obtener');

        if (!$response || !isset($response['data'])) {
            return back()->withErrors('No se pudo obtener lan lista de tipos de productos.');
        }

        $tipo = $response['data'];
        return view('pages.admin.tipo-producto.index', compact('tipos'));
    }

    public function create()
    {
        // dd('Llegué');
        return view('pages.admin.tipo-producto.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['active'] = $request->has('active') && $request->active === 'on';

        $response = $this->ferremaService->post('tipo-producto/crear', $data);

        if (!$response) {
            return back()->withErrors('No se pudo crear el tipo de producto.')->withInput();
        }

        return redirect()->route('admin.tipo.index')->with('success', 'Tipo de Producto creado correctamente.');
    }

    public function edit($id)
    {
        $response = $this->ferremaService->get('tipo-producto/obtener', ['id' => $id]);

        if (!$response || !isset($response['data'])) {
            return back()->withErrors('No se pudo obtener el tipo de producto');
        }

        $tipo = $response['data'];

        return view('pages.admin.tipo-producto.edit', compact('tipo'));
    }

    public function update()
    {
        dd('llegué al create');
    }

    public function destroy()
    {
        dd('llegué al create');
    }

    public function show()
    {
        dd('llegué al create');
    }
}
