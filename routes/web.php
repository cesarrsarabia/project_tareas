<?php

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

/**
Route::get('tareas/{nombre?}', function ($nombre = "User") {
    $nombre = strtoupper($nombre);
    return view('tareas.tareasIndex')->with(['nombre' => $nombre]);
    //return view('tareas/tareasIndex'); Otra opcion es con /
});

 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tarea','TareaController')->middleware('auth');

Route::resource('equipo','EquipoController');