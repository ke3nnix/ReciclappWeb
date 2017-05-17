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

Route::get('v1/puntos-de-acopio/{id}', 'ApiControllers\CollectionPointAPIController@show')->name('puntos-de-acopio.show');;
Route::get('v1/puntos-de-acopio/', 'ApiControllers\CollectionPointAPIController@index')->name('puntos-de-acopio.index');;
Route::get('v1/puntos-de-acopio/recoger', 'ApiControllers\CollectionPointAPIController@collect')->name('puntos-de-acopio.collect');
Route::get('v1/beneficios', 'ApiControllers\BenefitAPIController@index')->name('beneficios.index');