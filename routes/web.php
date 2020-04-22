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
Route::resource('/entidadoficina', 'EntidadOficinaController');

Route::resource('/plandesarrollo', 'PlanDesarrolloController');

Route::resource('/plandesarrollonivel1', 'PlanDesarrolloNivel1Controller');
Route::get('plandesarrollonivel1/listar/{idA}', 'PlanDesarrolloNivel1Controller@listar');

Route::resource('/plandesarrollonivel2', 'PlanDesarrolloNivel2Controller');
Route::get('plandesarrollonivel2/listar/{idA}/{idB}', 'PlanDesarrolloNivel2Controller@listar');

Route::resource('/plandesarrollonivel3', 'PlanDesarrolloNivel3Controller');
Route::get('plandesarrollonivel3/listar/{idA}/{idB}/{idC}', 'PlanDesarrolloNivel3Controller@listar');

Route::resource('/plandesarrollonivel4', 'PlanDesarrolloNivel4Controller');
Route::get('plandesarrollonivel4/hojadevida/{idA}/{idB}/{idC}/{idD}', 'PlanDesarrolloNivel4Controller@mostrarHojaDeVida');

Route::resource('/ods', 'RefOdsObjetivoController');

Route::resource('/pndesarrollo', 'RefNacionalPlanController');

Route::resource('/ppnacional', 'RefNacionalPoliticaController');

Route::resource('/ppdepartamental', 'RefDepartamentalPoliticaController');

Route::resource('/ppmunicipal', 'RefMunicipalPoliticaController');

Route::resource('/indicador', 'MedicionIndicadorController');


