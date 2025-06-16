<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TipoProductoController;


Route::get('/', [HomeController::class, 'index'])->name('home.index');

//http://localhost/admin/
//admin.producto.edit
//admin.productos.store
//localhost/admin/productos/destroy

Route::prefix('admin')->name('admin.')->group(function () {

    //PRODUCTO

    Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
    Route::get('/producto/create', [ProductoController::class, 'create'])->name('producto.create');
    Route::post('/producto/store', [ProductoController::class, 'store'])->name('producto.store');
    Route::get('/producto/show/{id}', [ProductoController::class, 'show'])->name('producto.show');
    Route::get('/producto/edit/{id}', [ProductoController::class, 'edit'])->name('producto.edit');
    Route::put('/producto/update/{id}', [ProductoController::class, 'update'])->name('producto.update');
    Route::delete('/producto/destroy/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');

    //MARCA

    Route::get('/marca', [MarcaController::class, 'index'])->name('marca.index');
    Route::get('/marca/create', [MarcaController::class, 'create'])->name('marca.create');
    Route::post('/marca/store', [MarcaController::class, 'store'])->name('marca.store');
    Route::get('/marca/show/{id}', [MarcaController::class, 'show'])->name('marca.show');
    Route::get('/marca/edit/{id}', [MarcaController::class, 'edit'])->name('marca.edit');
    Route::put('/marca/update/{id}', [MarcaController::class, 'update'])->name('marca.update');
    Route::delete('/marca/destroy/{id}', [MarcaController::class, 'destroy'])->name('marca.destroy');

    //TIPO PRODUCTO / CATEGORÍA

    Route::get('/tipo', [TipoProductoController::class, 'index'])->name('tipo.index');
    Route::get('tiṕo/create', [TipoProductoController::class, 'create'])->name('tipo.create');
    Route::post('tipo/store', [TipoProductoController::class,  'store'])->name('tipo.store');
    Route::get('tipo/edit/{id}', [TipoProductoController::class, 'edit'])->name('tipo.edit');
    Route::put('tipo/update/{id}', [TipoProductoController::class, 'update'])->name('tipo.update');
    Route::delete('tipo/destroy/{id}', [TipoProductoController::class, 'destroy'])->name('tipo.destroy');
});
