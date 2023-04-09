<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', ['App\Http\Controllers\CatalogoController', 'index'])->name('index');
Route::get('/busqueda', ['App\Http\Controllers\CatalogoController', 'buscar'])->name('buscar');
Route::get('/archivo/{id}', ['App\Http\Controllers\CatalogoController', 'show'])->name('show');