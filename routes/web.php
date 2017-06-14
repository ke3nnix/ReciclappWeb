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

Route::name('Inicio')->get('/', function () {
    return view('index');
});

Route::resource('puntos-de-acopio', 'CollectionPointController');

Route::resource('sponsors', 'SponsorController');

Route::resource('sponsors/{sponsor}/beneficios', 'SponsorBenefitController');

Route::resource('usuarios', 'UserController');