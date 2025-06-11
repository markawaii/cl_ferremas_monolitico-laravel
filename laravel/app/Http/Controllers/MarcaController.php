<?php

namespace App\Http\Controllers;

use App\Services\ferremaService;
use Illuminate\Http\Request;

class MarcaController extends Controller
{

    protected $ferremaService;

    public function __construct(ferremaService $ferremaService)
    {
        $this->ferremaService = $ferremaService;
    }

    public function index()
    {
        $response = $this->ferremaService->get('marca/obtener');

        if (!$response || !isset($response['data'])) {
            return back()->withErrors('Error al obtener marcas.');
        }

        $marcas = $response['data'];
        return view('pages.admin.marca.index', compact('marcas'));
    }

    public function create()
    {
        dd('llegué al create');
    }

    public function store()
    {
        dd('llegué al create');
    }

    public function edit($id)
    {
        dd('llegué al create');
    }

    public function update()
    {
        dd('llegué al create');
    }

    public function destroy($id)
    {
        dd('llegué al create');
    }

    public function show($id)
    {
        dd('llegué al create');
    }
}
