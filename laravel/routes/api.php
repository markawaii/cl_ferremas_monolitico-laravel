<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\MarcaController;


Route::get('/producto/obtener', [ProductoController::class, 'obtener_productos']);
Route::post('/producto/crear', [ProductoController::class, 'store']);
Route::put('/producto', [ProductoController::class, 'update' ]);
Route::delete('/producto', [ProductoController::class, 'destroy']);


Route::post('/marca/crear', [MarcaController::class, 'store']);
Route::put('/marca/{id}', [MarcaController::class, 'update']);
Route::delete('/marca/{id}', [MarcaController::class, 'destroy']);

// Route::controller(ProductoController::class)->prefix('productos')->group(function () {
//     // Route::get('obtener', 'obtener_productos');
//     // Route::post('crear', 'store');
//     // Route::put('actualizar', 'update');
//     // Route::delete('eliminar', 'destroy');
// });
// Route::controller(MarcaController::class)->prefix('marca')->group(function () {
//     Route::post('crear', 'crear_marca');
// });
