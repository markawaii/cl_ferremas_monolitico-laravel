<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function store(Request $request)
    {
        $marca = Marca::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'active' => $request->input('active') ? true : false,
        ]);

        $respuesta = [
            'brand_id' => $marca->id,
        ];

        return response()->json(['status' => 'success','message' => 'Marca creada correctamente', 'data' => $respuesta,]);
    }
}
