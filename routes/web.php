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
    return view('portada');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/ods', 'RefOdsObjetivoController');
Route::resource('/ppnacional', 'RefNacionalPoliticaController');
Route::resource('/ppdepartamental', 'RefDepartamentalPoliticaController');
Route::resource('/ppmunicipal', 'RefMunicipalPoliticaController');
