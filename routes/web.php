<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class,'index'])->name('dashboard');
//configuraciones
Route::get('/categorias-config', [CategoriaController::class,'list'])->name('categorias.config.index');
Route::get('/categorias-config-create', [CategoriaController::class,'create'])->name('admin.categorias.create');
Route::get('/categorias-config-edit/{id}', [CategoriaController::class,'edit'])->name('admin.categorias.edit');
Route::post('/admin-config-categorias-create', [CategoriaController::class,'store'])->name('admin.categorias.store');
Route::patch('/admin-config-categorias-update/{id}', [CategoriaController::class,'update'])->name('admin.categorias.update');
Route::delete('/admin-config-categorias-delete/{id}', [CategoriaController::class,'destroy'])->name('admin.categorias.destroy');
Route::get('/categoria-show/{id}', [CategoriaController::class,'show'])->name('categorias.show');

Route::get('/libros-config', [LibroController::class,'list'])->name('libros.config.index');
Route::get('/libros-config-create', [LibroController::class,'create'])->name('admin.libros.create');
Route::get('/libros-config-edit/{id}', [LibroController::class,'edit'])->name('admin.libros.edit');
Route::post('/admin-config-libros-create', [LibroController::class,'store'])->name('admin.libros.store');
Route::patch('/admin-config-libros-update/{id}', [LibroController::class,'update'])->name('admin.libros.update');
Route::delete('/admin-config-libros-delete/{id}', [LibroController::class,'destroy'])->name('admin.libros.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
