<?php

use Illuminate\Http\Request;

// Registro de usuario
Route::post('v1/registro', 'UserController@store');

// APIs para usuarios logueados usando Token Bearer
Route::group(['middleware' => 'auth:api'], function() {

    // USUARIO
    // Obtener datos de usuario
    Route::get('v1/usuario', function (Request $request) { return $request->user(); });
    // Actualizar datos de usuario
    Route::put('v1/usuario', 'UserController@update');

    // PUNTOS DE ACOPIO
    // Listar puntos de acopio
    Route::get('v1/puntos-de-acopio/', 'CollectionPointController@index');
    // Punto de acopio X
    Route::get('v1/puntos-de-acopio/{acopio}', 'CollectionPointController@show');

    // BENEFICIOS 
    // Listar todos los beneficios disponibles
    Route::get('v1/beneficios', 'SponsorBenefitController@indexAll');
    // Beneficios de usuario X
    Route::get('v1/usuarios/{usuario}/beneficios', 'UserBenefitController@index');
    // Beneficios Y de usuario X
    Route::get('v1/usuarios/{usuario}/beneficios/{beneficio}', 'UserBenefitController@show');
    // Agregando beneficio Y a usuario X
    Route::post('v1/usuarios/{usuario}/beneficios/{beneficio}', 'UserBenefitController@store');


    // ENTREGAS -COLABORADOR-
    // Listar todas las entregas hechas por el usuario X <<
    Route::get('v1/usuarios/{usuario}/entregas', 'ExchangeController@index');
    // Ver detalle de entrega realizada por el usuario X <<
    Route::get('v1/usuarios/{usuario}/entregas/{entrega}', 'ExchangeController@detail');
    // Listar entregas por punto de acopio
    

    // ENTREGAS -EMPLEADO-
    // Registrar una nueva entrega del usuario X <<
    Route::post('v1/usuarios/{usuario}/entregas', 'ExchangeController@store');
    // Listar entregas gestionadas por el empleado X [por punto de entrega] <<
    Route::get('v1/empleado/{empleado}/entregas', 'ExchangeController@details');

});
