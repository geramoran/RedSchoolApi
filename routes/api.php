<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
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

Route::resource('taller_has_escuelas', 'taller_has_escuelaController');

Route::resource('escuela_has_puntosfuertes', 'escuela_has_puntosfuertesController');

Route::resource('subnivels', 'subnivelController');

Route::resource('nivels', 'nivelController');

Route::resource('escuela_has_nivels', 'escuela_has_nivelController');

Route::resource('escuelas', 'escuelaController');
