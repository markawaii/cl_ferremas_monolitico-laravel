<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\TipoProductoController;



Route::get('/producto/obtener', [ProductoController::class, 'obtener_productos']);
Route::post('/producto/crear', [ProductoController::class, 'crear_producto']);
Route::put('/producto/{id}', [ProductoController::class, 'modificar_producto']);
Route::delete('/producto/{id}', [ProductoController::class, 'eliminar_producto']);

Route::get('/tipoproducto/obtener', [TipoProductoController::class, 'obtener_tipoprod']);
Route::post('/tipoproducto/crear', [TipoProductoController::class, 'crear_tipoprod']);
Route::put('/tipoproducto/{id}', [TipoProductoController::class, 'modificar_tipoprod']);
Route::delete('/tipoproducto/{id}', [TipoProductoController::class, 'eliminar_tipoprod']);

Route::get('/marca/obtener', [MarcaController::class, 'obtener_marcas']);
Route::post('/marca/crear', [MarcaController::class, 'crear_marca']);
Route::put('/marca/{id}', [MarcaController::class, 'modificar_marca']);
Route::delete('/marca/{id}', [MarcaController::class, 'eliminar_marca']);
