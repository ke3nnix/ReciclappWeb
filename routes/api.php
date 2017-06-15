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

// Retornar el perfil de usuario
Route::middleware('auth:api')->get('/usuario', function (Request $request) {
    return $request->user();
});

// PUNTOS DE ACOPIO
// Listar puntos de acopio
Route::get('v1/puntos-de-acopio/', 'CollectionPointController@index')->name('puntos-de-acopio.index');;
// Punto de acopio X
Route::get('v1/puntos-de-acopio/{acopio}', 'CollectionPointController@show')->name('puntos-de-acopio.show');;
// Vaciar punto de acopio X
// Route::get('v1/puntos-de-acopio/recoger', 'CollectionPointController@collect')->name('puntos-de-acopio.collect');

// BENEFICIOS 
// Listar todos los beneficios disponibles
Route::get('v1/beneficios', 'SponsorBenefitController@indexAll')->name('beneficios.todos');
// Beneficios de usuario X
Route::get('v1/usuarios/{usuario}/beneficios', 'UserBenefitController@index')->name('usuario-beneficio.index');
// Beneficios Y de usuario X
Route::get('v1/usuarios/{usuario}/beneficios/{beneficio}', 'UserBenefitController@show')->name('usuario-beneficio.show');
// Agregando beneficio Y a usuario X
Route::post('v1/usuarios/{usuario}/beneficios/{beneficio}', 'UserBenefitController@store')->name('usuario-beneficio.store');

// ENTREGAS -COLABORADOR-
// Listar todas las entregas hechas por el usuario X <<
Route::get('v1/usuarios/{usuario}/entregas', 'ExchangeController@index')->name('entrega.index');
// Ver detalle de entrega realizada por el usuario X <<
Route::get('v1/usuarios/{usuario}/entregas/{entrega}', 'ExchangeController@detail')->name('entrega.detail');

// ENTREGAS -EMPLEADO-
// Registrar una nueva entrega del usuario X <<
Route::post('v1/usuarios/{usuario}/entregas', 'ExchangeController@store')->name('entrega.store');
// Listar entregas gestionadas por el empleado X [por punto de entrega] <<
Route::get('v1/empleado/{empleado}/entregas', 'ExchangeController@details')->name('entrega.details');

// USUARIOS
// Registrar un nuevo usuario <<
Route::post('v1/usuarios', 'UserController@register')->name('usuario.register');
// Iniciar sesión <<
Route::get('v1/usuario', 'UserController@login')->name('usuario.login');
// Ver perfil de usuario X <<
Route::get('v1/usuario', 'UserController@show')->name('usuario.show');
// Actualizar información del usuario X
Route::put('v1/usuario', 'UserController@update')->name('usuario.update');