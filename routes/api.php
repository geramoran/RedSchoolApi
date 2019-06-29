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


Route::resource('typemedia', 'typemediaAPIController');

Route::resource('tallers', 'tallerAPIController');

Route::resource('instalaciones', 'instalacionesAPIController');

Route::resource('tags', 'tagsAPIController');

Route::resource('puntosfuertes', 'puntosfuertesAPIController');

Route::resource('reconocimientos', 'reconocimientosAPIController');

Route::resource('nivelatributos', 'nivelatributosAPIController');

Route::resource('subnivelatributos', 'subnivelatributosAPIController');

Route::resource('tipocontactos', 'tipocontactoAPIController');

Route::resource('cuotas', 'cuotaAPIController');

Route::resource('media', 'mediaAPIController');

Route::resource('contactos', 'contactoAPIController');

Route::resource('taller_has_escuelas', 'taller_has_escuelaAPIController');

Route::resource('escuela_has_puntosfuertes', 'escuela_has_puntosfuertesAPIController');

Route::resource('subnivels', 'subnivelAPIController');

Route::resource('nivels', 'nivelAPIController');

Route::resource('escuela_has_nivels', 'escuela_has_nivelAPIController');

Route::resource('escuelas', 'escuelaAPIController');