<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedoresController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//RUTA PARA PRODUCTOS
//ruta para listar los productos 
Route::get('/dashboard',[ProductoController::class, 'listar'])->middleware(['auth', 'verified'])->name('dashboard');

//ruta pora insertar productos
Route::post('/registrarProducto',[ProductoController::class, 'create'])->middleware(['auth', 'verified'])->name('create');

//ruta pora modificar productos
Route::post('/modificarProducto',[ProductoController::class, 'update'])->middleware(['auth', 'verified'])->name('update');

//ruta pora Eliminar productos
Route::get('/EliminarProducto-{id}',[ProductoController::class, 'delete'])->middleware(['auth', 'verified'])->name('delete');




//RUTA PARA PROVEEDORES
Route::get('/Proveedores',[ProveedoresController::class, 'listar'])->middleware(['auth', 'verified'])->name('Proveedores');


//RUTAS DEL DASHBOARD
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
