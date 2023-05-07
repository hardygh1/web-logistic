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
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/new', function(){
        return 'new page';
    });

    Route::get('/events', function(){

        //Obtener los eventos de la BD
        $events = Event::all();

        //ASignar la cabecera la muestra datatable
        $heads = [
            'ID',
            'Nombre',
            'Descripcion',
            'Estado',
            'Tipo',
            'Fecha'
        ];

        //Retornamos la vida con la vida de parametros
        return view('events', compact('events','heads'));
    });

    Route::get('/events/create', function(){
        return view('events-create');
    });

    Route::resource('/clientes', \App\Http\Controllers\ClienteController::class);

    Route::resource('/paquetes', \App\Http\Controllers\PaqueteController::class);

    Route::resource('/proveedores', \App\Http\Controllers\ProveedoreController::class);


});

