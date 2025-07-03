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
            'name' => 'required|string|unique:marcas,name|max:255',
            'description' => 'nullable|string',
        ]);

        $data['active'] = $request->has('active') ? 1 : 0;

        $response = $this->ferremaService->post('marca/crear', $data);

        if (!$response) {
            return back()->withErrors('Ocurrió un error al crear la marca')->withInput();
        }

        return redirect()->route('admin.marca.index')->with('sucess', 'Marca creada correctamente');
    }

    public function edit($id)
    {
        $response = $this->ferremaService->get('marca/obtener', ['id' => $id]);

        if (!$response || !isset($response['data'])) {
            return back()->withErrors('No se pudo obtener la marca');
        }

        $marca = $response['data'];

        return view('pages.admin.marca.edit', compact('marca'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        // Convertir 'active' a 1 si viene como 'on', si no, a 0
        $data['active'] = $request->input('active') === 'on';

        // Agregar el ID al array de datos
        $data['id'] = $id;

        // Enviar los datos a la API o servicio
        $response = $this->ferremaService->put('marca/modificar', $data);

        // Verificar si hubo error en la respuesta
        if (!$response) {
            return back()->withErrors('Ocurrió un error al actualizar la marca.');
        }

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.marca.index')->with('success', 'Marca actualizada correctamente.');
    }


    public function destroy($id)
    {
        $response = $this->ferremaService->delete('marca/eliminar', ['id' => $id]);

        if (!$response) {
            return back()->withErrors('No se pudo eliminar la marca.');
        }

        return redirect()->route('admin.marca.index')->with('success', 'Marca eliminada correctamente.');
    }

    public function show($id)
    {
        $response = $this->ferremaService->get('marca/obtener', ['id' => $id]);

        if (!$response || !isset($response['data'])) {
            return back()->withErrors('No se pudo obtener la información de la marca.');
        }

        $marca = $response['data'];

        return view('pages.admin.marca.show', compact('marca'));
    }
}
