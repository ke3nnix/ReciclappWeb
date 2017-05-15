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

Route::get('v1/acopio/{id}', 'ApiControllers\CollectionPointAPIController@show');

Route::get('puntos-de-acopio/recoger', 'ApiControllers\CollectionPointAPIController@recoger')->name('puntos-de-acopio.recoger');
