<?php

namespace App\Http\Controllers;

use App\Services\ferremaService;

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

    public function store()
    {
        dd('llegue al create');
    }

    public function show()
    {
        dd('llegue al create');
    }

    public function edit($id)
    {
        $response = $this->ferremaService->get('producto/obtener', ['id' => $id]);
        // dd($response);
        $producto = $response['data'];

        $responseMarcas = $this->ferremaService->get('marca/obtener');
        $marcas= $responseMarcas['data'];
        // dd(['producto' => $producto, 'marcas'=>$marcas]);
        return view('pages.admin.producto.edit', compact('producto', 'marcas'));
    }

    public function update()
    {
        dd('llegue al create');
    }

    public function delete()
    {
        dd('llegue al create');
    }
}
