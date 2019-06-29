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


Route::resource('typemedia', 'typemediaController');

Route::resource('tallers', 'tallerController');

Route::resource('instalaciones', 'instalacionesController');

Route::resource('tags', 'tagsController');

Route::resource('puntosfuertes', 'puntosfuertesController');

Route::resource('reconocimientos', 'reconocimientosController');

Route::resource('nivelatributos', 'nivelatributosController');

Route::resource('subnivelatributos', 'subnivelatributosController');

Route::resource('tipocontactos', 'tipocontactoController');

Route::resource('cuotas', 'cuotaController');

Route::resource('media', 'mediaController');

Route::resource('contactos', 'contactoController');

Route::resource('tallerHasEscuelas', 'taller_has_escuelaController');

Route::resource('escuelaHasPuntosfuertes', 'escuela_has_puntosfuertesController');

Route::resource('subnivels', 'subnivelController');

Route::resource('nivels', 'nivelController');

Route::resource('escuelaHasNivels', 'escuela_has_nivelController');

Route::resource('escuelas', 'escuelaController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
