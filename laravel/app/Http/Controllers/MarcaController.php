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
        return view('pages.admin.marca.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data['active'] = $request->has('active') ? 1 : 0;

        $response = $this->ferremaService->post('marca/crear', $data);

        if (!$response) {
            return back()->withErrors('Ocurrió un error al crear la marca')->withInput();
        }

        return redirect()->route('admin.marca.index')->with('sucess', 'Marca creada correctamente');

        // dd('llegué al create');
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
