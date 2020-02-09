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

Route::resource('/entidad', 'EntidadController');
Route::resource('/administracion', 'AdministracionController');
Route::resource('/organigrama', 'EntidadOficinaController');

Route::resource('/plandesarrollo', 'PlanDesarrolloController');
Route::get('plandesarrollonivel1/listar/{idA}', 'PlanDesarrolloNivel1Controller@listar');
Route::get('plandesarrollonivel2/listar/{idA}/{idB}', 'PlanDesarrolloNivel2Controller@listar');
Route::get('plandesarrollonivel3/listar/{idA}/{idB}/{idC}', 'PlanDesarrolloNivel3Controller@listar');

Route::resource('/ods', 'RefOdsObjetivoController');

Route::resource('/pndesarrollo', 'RefNacionalPlanController');

Route::resource('/ppnacional', 'RefNacionalPoliticaController');

Route::resource('/ppdepartamental', 'RefDepartamentalPoliticaController');

Route::resource('/ppmunicipal', 'RefMunicipalPoliticaController');


