<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function crear_mamrca() {
        dd('Llegamosa la función');
    }

    public function store(Request $request) {
        $marca = Marca::create([
            'name' =>$request->input('nombre'),
            'description' =>$request->input('descripcion'),
            'active' =>$request->input('active') ? true:false
        ]);

        $respuesta = {
            'brand_id' => $marca->id,
        };

        return response ()->json(['status' =>'success', 'message' => 'Marca creada correctamente' , 'data' => $respuesta]);
    }
}
