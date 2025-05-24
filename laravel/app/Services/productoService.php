<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;


class productoService
{
    public function obtenerTodos()
    {
        $response = Http::get('http://localhost/api/producto/obtener');

        if ($response->successful()) {
            return $response->json();
        }

        return "Error: " . $response->status();
    }
}
