<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PedidoController;

Route::controller(ProductoController::class)->prefix('productos')->group(function () {
    Route::get('obtener', 'obtener_productos');
    Route::get('obtener-uno','obtener_producto');
    Route::post('crear', 'store');
    Route::put('actualizar', 'update');
    Route::delete('eliminar', 'destroy');
});
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('pedidos', PedidoController::class);
