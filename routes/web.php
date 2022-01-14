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
Route::get('plandesarrollonivel4/listarhojadevida/{idA}/{idB}/{idC}/{idD}', 'PlanDesarrolloNivel4Controller@listarRegistrosHojaDeVida');
Route::match(array('GET', 'POST'), '/plandesarrollonivel4listarregistros', 'PlanDesarrolloNivel4Controller@listarRegistros')->name('/plandesarrollonivel4listarregistros');


//Ruta para validar manualmente un formulario sea por GET o POST
// ->name se utiliza para definir el nombre con el que la ruta sera llamada desde una vista


// Rutas Analitica de datos - Graficas
Route::match(array('GET', 'POST'), '/graficaplancomponentes', 'PlanDesarrolloController@graficaPlanComponentes')->name('/plandesarrolloinfografia');
Route::match(array('GET', 'POST'), '/graficaplanresponsables', 'PlanDesarrolloController@graficaPlanResponsables')->name('/plandesarrolloinfografia');
Route::match(array('GET', 'POST'), '/graficaplanods', 'PlanDesarrolloController@graficaPlanODS')->name('/graficaplanods');
Route::match(array('GET', 'POST'), '/graficaplanmipg', 'PlanDesarrolloController@graficaPlanMIPG')->name('/graficaplanmipg');
Route::match(array('GET', 'POST'), '/graficaplanppmunicipal', 'PlanDesarrolloController@graficaPlanPPMunicipal')->name('/graficaplanppmunicipal');

Route::match(array('GET', 'POST'), '/graficaavanceplandesarrollo2020', 'PlanDesarrolloNivel4Controller@graficaListarAvanceNivel42020')->name('/graficaavanceplandesarrollo2020');
Route::match(array('GET', 'POST'), '/graficaavanceplandeaccion2020', 'PlanDesarrolloNivel4Controller@graficaListarAvanceNivel42020')->name('/graficaavanceplandeaccion2020');

Route::match(array('GET', 'POST'), '/graficaavanceplandesarrollo2021', 'PlanDesarrolloNivel4Controller@graficaListarAvanceNivel42021')->name('/graficaavanceplandesarrollo2021');
Route::match(array('GET', 'POST'), '/graficaavanceplandeaccion2021', 'PlanDesarrolloNivel4Controller@graficaListarAvanceNivel42021')->name('/graficaavanceplandeaccion2021');

Route::match(array('GET', 'POST'), '/graficacarreracumplimiento', 'PlanDesarrolloNivel4Controller@graficaCarreraCumplimiento')->name('/graficacarreracumplimiento');

Route::match(array('GET', 'POST'), '/graficaavancesemaforos', 'PlanDesarrolloNivel4Controller@graficaListarAvanceNivel4')->name('/graficaavancesemaforos');
// Fin Rutas ***


// Ruta Regeneracion de los Niveles de Ejecucion - Para las 4 vigencias - TODAS LAS METAS
// Tablas PLAN ACCION -> PLAN INDICATIVO -> INDICADOR -> NIVEL4
Route::match(array('GET', 'POST'), '/regenerarNivelesEjecucionTodasMetas', 'PlanDesarrolloNivel4Controller@regenerarNivelesEjecucionTodasMetas')->name('/regenerarNivelesEjecucionTodasMetas');
// Fin Rutas ***


// Rutas convergencias ODS
Route::match(array('GET', 'POST'), 'vincularods', 'PlanDesarrolloNivel4Controller@vincularODS')->name('vincularods');
Route::match(array('GET', 'POST'), '/odslistarconvergencia', 'RefOdsObjetivoController@listarConvergencia')->name('/odslistarconvergencia');
// Fin Rutas ***


Route::match(array('GET', 'POST'), 'vincularnacionalplan', 'PlanDesarrolloNivel4Controller@vincularNacionalPlan')->name('vincularnacionalplan');


// Rutas convergencias POLITICAS PUBLICAS LOCALES
Route::match(array('GET', 'POST'), 'vincularmunicipalpolitica', 'PlanDesarrolloNivel4Controller@vincularMunicipalPolitica')->name('vincularmunicipalpolitica');
Route::match(array('GET', 'POST'), '/ppmunicipallistarconvergencia', 'RefMunicipalPoliticaController@listarConvergencia')->name('/ppmunicipallistarconvergencia');
// Fin Rutas ***


// Rutas convergencias MIPG
Route::match(array('GET', 'POST'), 'vincularmipg', 'PlanDesarrolloNivel4Controller@vincularMIPG')->name('vincularmipg');
Route::match(array('GET', 'POST'), '/mipglistarconvergencia', 'RefMipgPoliticaController@listarConvergencia')->name('/mipglistarconvergencia');

Route::resource('/mipgtarea', 'MipgTareaController');

Route::match(array('GET', 'POST'), '/mipgplanaccionlistar2021', 'MipgPlanAccionController@listarRegistros2021')->name('/mipgplanaccionlistar2021');
Route::match(array('GET', 'POST'), '/mipgplanaccionlistarreporte2021', 'MipgPlanAccionController@listarRegistrosReporte2021')->name('/mipgpplanaccionlistarreporte2021');

//Fin Rutas ***


// Rutas listar Plan Indicativo
Route::match(array('GET', 'POST'), '/planindicativolistar', 'PlanIndicativoController@listarRegistros')->name('/planindicativolistar');
// Fin Rutas ***


// Rutas para listar planes de accion por vigencias
Route::match(array('GET', 'POST'), '/planaccionlistar2020', 'PlanAccionController@listarRegistros2020')->name('/planaccionlistar2020');
Route::match(array('GET', 'POST'), '/planaccionlistar2021', 'PlanAccionController@listarRegistros2021')->name('/planaccionlistar2021');
// Fin Rutas ***

// Rutas para construir planes de accion por vigencias
Route::match(array('GET', 'POST'), '/planaccionconstruir2022', 'PlanAccionController@listarConstruir2022')->name('/planaccionconstruir2022');

Route::resource('/acciones', 'PlanAccionController');
// Fin Rutas ***


// Rutas para reportar tareas en los planes de accion por vigencias
Route::match(array('GET', 'POST'), '/planaccionlistarreporte2020', 'PlanAccionController@listarRegistrosReporte2020')->name('/planaccionlistarreporte2020');
Route::match(array('GET', 'POST'), '/planaccionlistarreporte2021', 'PlanAccionController@listarRegistrosReporte2021')->name('/planaccionlistarreporte2021');
// Fin Rutas ***


// Ruta para listar avances PLAN DE ACCION - AVANCE DE EJECUCION
Route::match(array('GET', 'POST'), '/planaccionlistaravance2020', 'PlanAccionController@listarAvancePlanAccion2020')->name('/planaccionlistaravance2020');
Route::match(array('GET', 'POST'), '/planaccionlistaravance2021', 'PlanAccionController@listarAvancePlanAccion2021')->name('/planaccionlistaravance2021');
// Fin Rutas ***


// Ruta para listar avances PLAN DE ACCION - PONDERADO EJECUCION ACTIVIDADES
Route::match(array('GET', 'POST'), '/plandesarrollonivel4listaravance2020', 'PlanDesarrolloNivel4Controller@listarAvanceNivel42020')->name('/plandesarrollonivel4listaravance2020');
Route::match(array('GET', 'POST'), '/plandesarrollonivel4listaravance2021', 'PlanDesarrolloNivel4Controller@listarAvanceNivel42021')->name('/plandesarrollonivel4listaravance2021');
// Fin Rutas ***


// Rutas para listar tareas reportadas por vigencias
Route::resource('/tarea', 'TareaController');
Route::match(array('GET', 'POST'), '/tareasdestacar', 'TareaController@tareaDestacada')->name('/tareasdestacar');
Route::match(array('GET', 'POST'), '/tareaslistargeneral2020', 'TareaController@listarRegistros2020')->name('/tareaslistargeneral2020');
Route::match(array('GET', 'POST'), '/tareaslistargeneral2021', 'TareaController@listarRegistros2021')->name('/tareaslistargeneral2021');
// Fin Rutas ***


// Rutas para listar tareas reportadas por vigencias EXPORT EXCEL
Route::match(array('GET', 'POST'), '/tareaslistargeneralexcel2020', 'TareaController@listarRegistrosExcel2020')->name('/tareaslistargeneralexcel2020');
Route::match(array('GET', 'POST'), '/tareaslistargeneralexcel2021', 'TareaController@listarRegistrosExcel2021')->name('/tareaslistargeneralexcel2021');
// Fin Rutas ***


Route::resource('/ods', 'RefOdsObjetivoController');


// Rutas consulta de referentes
Route::resource('/pndesarrollo', 'RefNacionalPlanController');
Route::resource('/ppnacional', 'RefNacionalPoliticaController');
Route::resource('/ppdepartamental', 'RefDepartamentalPoliticaController');
Route::resource('/ppmunicipal', 'RefMunicipalPoliticaController');
Route::resource('/mipg', 'RefMipgPoliticaController');
// Fin Rutas ***


Route::resource('/indicador', 'MedicionIndicadorController');


// Informes tipo Export
Route::match(array('GET', 'POST'), '/informetipounoexcel2020', 'TareaController@informeTipoUnoExcel2020')->name('/informetipounoexcel2020');
Route::match(array('GET', 'POST'), '/informetipounoexcel2021', 'TareaController@informeTipoUnoExcel2021')->name('/informetipounoexcel2021');
// Fin informes ***


