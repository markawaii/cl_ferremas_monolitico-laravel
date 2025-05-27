<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;


class productoService
{
    public function obtenerTodos()
    {
        try {
            $response = Http::get('http://host.docker.internal/api/producto/obtener')->json();

            if (!isset($response['status']) || $response['status'] !== 'success') {
                return false;
            }

            return $response;
        } catch (Exception $e) {
            echo 'Excepcion capturada: ', $e->getMessage();
            return false;
        }
    }

    public function crearProducto(array $datos)
    {
        try {
            $response = Http::post('http://host.docker.internal/api/producto/crear', $datos)->json();

            if (!isset($response['status']) || $response['status'] !== 'success') {
                return false;
            }

            return $response;
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage();
            return false;
        }
    }
}
