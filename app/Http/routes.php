<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index.index');
});

Route::resource('estudiante','EstudianteController');

Route::resource('actividad','ActividadController');

Route::resource('seguimiento','SeguimientoController');

Route::resource('profesor','ProfesorController');

Route::resource('asignatura','AsignaturaController');


Route::resource('nota','NotaController');

Route::group(['domain' => '{account}.myapp.com'], function () {
    Route::get('user/{id}', function ($account, $id) {
        return dd($account,$id);
    });
});