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
/*Route::name('Login')->get('/', function () {
    return view('login.login');
});*/



// Auth::routes();



Route::post('login', 'Auth\LoginController@authenticate')->name('login');

Route::get('login', 'Auth\LoginController@Login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function() {

    Route::name('inicio')->get('/', function () {
        return view('index');
    });

    // Route::get('/home', 'HomeController@index')->name('home');

    Route::name('perfil')->get('perfil',function(){
        return view('perfil-admin.perfil-admin');
    });

    Route::resource('puntos-de-acopio', 'CollectionPointController');

    Route::resource('sponsors', 'SponsorController');

    Route::resource('sponsors/{sponsor}/beneficios', 'SponsorBenefitController');

    Route::resource('usuarios', 'UserController');


});
