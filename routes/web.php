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



Auth::routes();



Route::post('login', 'Auth\LoginController@authenticate')->name('login');

Route::get('login', 'Auth\LoginController@Login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function() {

    // Route::name('inicio')->get('/', function () {
    //     return view('index');
    // });

    Route::get('/', 'HomeController@index')->name('inicio');

    Route::name('perfil')->get('perfil',function(){
        return view('perfil-admin.perfil-admin');
    });

    Route::name('edit.perfil')->get('perfil/edit', function() {
        return view('perfil-admin.edit');
    });
    
    Route::post('perfil/edit', 'UserController@update_profile')->name('perfil.edit');

    Route::resource('puntos-de-acopio', 'CollectionPointController');

    Route::resource('sponsors', 'SponsorController');

    Route::resource('sponsors/{sponsor}/beneficios', 'SponsorBenefitController');

    Route::resource('usuarios', 'UserController');

    Route::post('puntos-de-acopio/{acopio}/recoger', 'CollectionPointController@collect')->name('puntos-de-acopio.recoger');

    Route::get('almacen', 'WasteController@index')->name('desechos.index');

});

