<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoProductoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/tipos', [TipoProductoController::class, 'index'])->name('tipos.index');
Route::post('/tipos', [TipoProductoController::class, 'store'])->name('tipos.store');
Route::put('/tipos/{id}', [TipoProductoController::class, 'update'])->name('tipos.update');
Route::delete('/tipos/{id}', [TipoProductoController::class, 'destroy'])->name('tipos.destroy');


Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');
Route::post('/marcas', [MarcaController::class, 'store'])->name('marcas.store');
Route::put('/marcas/{id}', [MarcaController::class, 'update'])->name('marcas.update');
Route::delete('/marcas/{id}', [MarcaController::class, 'destroy'])->name('marca.destroy');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
