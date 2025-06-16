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

        if(!$response || !isset($response['data']))
        {
            return back()->withErrors('No se pudo obtener lan lista de tipos de productos.');
        }

        $tipos = $response['data'];
        return view('pages.admin.tipo-producto.index', compact('tipos'));
    }

    public function create()
    {
        dd('llegué al create');
    }

    public function store()
    {
        dd('llegué al create');
    }

    public function edit()
    {
        dd('llegué al create');
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
