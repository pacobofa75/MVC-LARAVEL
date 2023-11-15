<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);

Route::controller(EquipoController::class)->group(function(){

    Route::get('/equipos', 'index')->name('equipos.index');
    Route::get('/equipos/create', 'create')->name('equipos.create');
    Route::post('/equipos/create', 'store')->name('equipos.store');
    Route::get('/equipos/show', 'show')->name('equipos.show');
    Route::get('/equipos/{equipo}/edit', 'edit')->name('equipos.edit');
    Route::put('/equipos/{equipo}/update', 'update')->name('equipos.update');
    Route::delete('/equipos/{equipo}/delete', 'delete')->name('equipos.delete');
});


Route::controller(PartidoController::class)->group(function(){
    Route::get('/partidos', 'index')->name('partidos.index');
    Route::get('/partidos/create', 'create')->name('partidos.create');
    Route::post('/partidos/create', 'store')->name('partidos.store');
    Route::get('/partidos/show', 'show')->name('partidos.show');
    Route::get('/partidos/{partido}/edit', 'edit')->name('partidos.edit');
    Route::put('/partidos/{partido}/update', 'update')->name('partidos.update');
    Route::delete('/partidos/{partido}/delete', 'delete')->name('partidos.delete');
});