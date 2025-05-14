<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\TipoProductoController;



Route::get('/producto/obtener', [ProductoController::class, 'obtener_productos']);
Route::post('/producto/crear', [ProductoController::class, 'store']);
Route::put('/producto/{id}', [ProductoController::class, 'update']);
Route::delete('/producto/{id}', [ProductoController::class, 'destroy']);

Route::get('/tipoproducto/obtener', [TipoProductoController::class, 'obtener_tipoprod']);
Route::post('/tipoproducto/crear', [TipoProductoController::class, 'store']);
Route::put('/tipoproducto/{id}', [TipoProductoController::class, 'update']);
Route::delete('/tipoproducto/{id}', [TipoProductoController::class, 'destroy']);

Route::post('/marca/crear', [MarcaController::class, 'store']);
Route::put('/marca/{id}', [MarcaController::class, 'update']);
Route::delete('/marca/{id}', [MarcaController::class, 'destroy']);
