<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/productos', [ProductoController::class, 'obtener_productos']);
Route::get('/productos/{id}', [ProductoController::class, 'obtener_producto']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->whereNumber('id');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->whereNumber('id');
