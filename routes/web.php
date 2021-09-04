<?php

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

Route::get('/', function () {
    return view('welcome');
});
//Rutas de las empresas
Route::get('/empresas', [App\Http\Controllers\EmpresasController::class, 'index'])->name('empresas.index');
Route::get('/empresas/create', [App\Http\Controllers\EmpresasController::class, 'create'])->name('empresas.create');
Route::post('/empresas/store', [App\Http\Controllers\EmpresasController::class, 'store'])->name('empresas.store');
Route::get('/empresas/show/{id}', [App\Http\Controllers\EmpresasController::class, 'show'])->name('empresas.show');
Route::get('/empresas/edit/{id}', [App\Http\Controllers\EmpresasController::class, 'edit'])->name('empresas.edit');
Route::put('/empresas/update/{id}', [App\Http\Controllers\EmpresasController::class, 'update'])->name('empresas.update');
Route::delete('/empresas/delete/{id}', [App\Http\Controllers\EmpresasController::class, 'delete'])->name('empresas.delete');

//Rutas de las peliculas
Route::get('/peliculas', [App\Http\Controllers\PeliculasController::class, 'index'])->name('peliculas.index');
Route::get('/peliculas/create', [App\Http\Controllers\PeliculasController::class, 'create'])->name('peliculas.create');
Route::post('/peliculas/store', [App\Http\Controllers\PeliculasController::class, 'store'])->name('peliculas.store');
Route::get('/peliculas/show/{id}', [App\Http\Controllers\PeliculasController::class, 'show'])->name('peliculas.show');
Route::get('/peliculas/edit/{id}', [App\Http\Controllers\PeliculasController::class, 'edit'])->name('peliculas.edit');
Route::put('/peliculas/update/{id}', [App\Http\Controllers\PeliculasController::class, 'update'])->name('peliculas.update');
Route::delete('/peliculas/delete/{id}', [App\Http\Controllers\PeliculasController::class, 'delete'])->name('peliculas.delete');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
