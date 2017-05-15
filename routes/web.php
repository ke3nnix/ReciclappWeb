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
    return view('index');
});

Route::resource('puntos-de-acopio', 'WebControllers\CollectionPointController');

Route::resource('sponsors', 'WebControllers\SponsorController');

Route::resource('sponsors/{sponsorId}/beneficios', 'WebControllers\SponsorBenefitController');

Route::resource('usuarios', 'WebControllers\UserController');