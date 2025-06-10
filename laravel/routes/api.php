<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MarcaController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\TipoProductoController;


// Prefijo para productos
Route::prefix('producto')->group(function () {
    Route::get('/obtener', [ProductoController::class, 'obtener_productos']);
    Route::post('/crear', [ProductoController::class, 'crear_producto']);
    Route::put('/modificar', [ProductoController::class, 'modificar_producto']);
    Route::delete('/eliminar', [ProductoController::class, 'eliminar_producto']);
});

// Prefijo para tipo de producto
Route::prefix('tipo-producto')->group(function () {
    Route::get('/obtener', [TipoProductoController::class, 'obtener_tipoprod']);
    Route::post('/crear', [TipoProductoController::class, 'crear_tipoprod']);
    Route::put('/modificar', [TipoProductoController::class, 'modificar_tipoprod']);
    Route::delete('/eliminar', [TipoProductoController::class, 'eliminar_tipoprod']);
});

// Prefijo para marcas
Route::prefix('marca')->group(function () {
    Route::get('/obtener', [MarcaController::class, 'obtener_marcas']);
    Route::post('/crear', [MarcaController::class, 'crear_marca']);
    Route::put('/modificar', [MarcaController::class, 'modificar_marca']);
    Route::delete('/eliminar', [MarcaController::class, 'eliminar_marca']);
});

