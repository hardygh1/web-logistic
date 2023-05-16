<?php

use App\Models\Event;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/new', function () {
        return 'new page';
    });

    Route::resource('/clientes', \App\Http\Controllers\ClienteController::class);

    Route::get('/clientes/validar-identificacion', '\App\Http\Controllers\ClienteController@validarIdentificacion')->name('clientes.validar.identificacion');


    Route::resource('/paquetes', \App\Http\Controllers\PaqueteController::class);

    Route::resource('/proveedores', \App\Http\Controllers\ProveedoreController::class);

    Route::resource('/categorias', \App\Http\Controllers\CategoriaController::class);

    Route::resource('/articulos', \App\Http\Controllers\ArticuloController::class);

    Route::resource('/reportes', \App\Http\Controllers\ReportesController::class);
});


