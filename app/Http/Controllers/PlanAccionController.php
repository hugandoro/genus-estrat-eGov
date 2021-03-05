<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlanDesarrollo;
use App\PlanDesarrolloNivel1;
use App\PlanDesarrolloNivel2;
use App\PlanDesarrolloNivel3;
use App\PlanDesarrolloNivel4;
use App\EntidadOficina;
use App\MedicionIndicador;
use App\PlanIndicativo;
use App\PlanAccion;
use App\Tarea;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MedicionIndicadorController;

class PlanAccionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * VIGENCIA 2020 - Listar GLOBALMENTE todos los registros del nivel 4 ( Actividades o Metas ) 
     * @return \Illuminate\Http\Response
     */
    public function listarRegistros2020()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();

        //Hace una primer busqueda GENERAL
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')->paginate(10);

        //Valida si trae un filtro de busqueda por Secretaria | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                        ->where('oficina_id', $_GET['filtroSecretaria'])
                                        ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                        ->paginate(10);
                                        
        if ((isset($_GET['filtroactividad'])) && ($_GET['filtroactividad'] != '')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('numeral', $_GET['filtroactividad'])
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(10);

        if ((isset($_GET['filtropalabras'])) && ($_GET['filtropalabras'] != '')){ 
            $filtropalabra = $_GET['filtropalabras'];
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('nombre', 'LIKE', "%$filtropalabra%")
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(10);
        }
        
        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $planDesarrolloNivel4->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODOS los indicadores
        $medicionIndicador = MedicionIndicador::orderBy('nivel4_id')
                        ->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')
                        ->get(); 

        //Carga TODO el plan indicativo - Vigencia 2020 (Codigo ID N° 12)
        $planIndicativo = PlanIndicativo::orderBy('vigencia_id')
                            ->where('vigencia_id', '=', "12") //! vigencia_id cambia segun la vigencia
                            ->with('indicador','vigencia','indicador.unidadMedida','indicador.Medida', 'indicador.Tipo', 'indicador.Nivel4', 'indicador.Nivel4.nivel3', 'indicador.Nivel4.nivel3.nivel2','indicador.Nivel4.nivel3.nivel2.nivel1','indicador.Nivel4.nivel3.nivel2.nivel1.plandesarrollo','indicador.Nivel4.entidadOficina')
                            ->get();

        //Carga TODO el plan de accion (TODAS las acciones inscritas)
        $planAccion = PlanAccion::orderBy('plan_indicativo_id')
                            ->with('planIndicativo')
                            ->get();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();
        return view('planaccion.listarplanaccion2020', compact('planDesarrollo','planDesarrolloNivel4','medicionIndicador','planIndicativo','planAccion','entidadOficina','pagination'));
    }

    /**
     * VIGENCIA 2021 - Listar GLOBALMENTE todos los registros del nivel 4 ( Actividades o Metas ) 
     * @return \Illuminate\Http\Response
     */
    public function listarRegistros2021()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();

        //Hace una primer busqueda GENERAL
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')->paginate(10);

        //Valida si trae un filtro de busqueda por Secretaria | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                        ->where('oficina_id', $_GET['filtroSecretaria'])
                                        ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                        ->paginate(10);
                                        
        if ((isset($_GET['filtroactividad'])) && ($_GET['filtroactividad'] != '')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('numeral', $_GET['filtroactividad'])
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(10);

        if ((isset($_GET['filtropalabras'])) && ($_GET['filtropalabras'] != '')){ 
            $filtropalabra = $_GET['filtropalabras'];
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('nombre', 'LIKE', "%$filtropalabra%")
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(10);
        }
        
        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $planDesarrolloNivel4->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODOS los indicadores
        $medicionIndicador = MedicionIndicador::orderBy('nivel4_id')
                        ->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')
                        ->get(); 

        //Carga TODO el plan indicativo - Vigencia 2021 (Codigo ID N° 13)
        $planIndicativo = PlanIndicativo::orderBy('vigencia_id')
                            ->where('vigencia_id', '=', "13") //! vigencia_id cambia segun la vigencia
                            ->with('indicador','vigencia','indicador.unidadMedida','indicador.Medida', 'indicador.Tipo', 'indicador.Nivel4', 'indicador.Nivel4.nivel3', 'indicador.Nivel4.nivel3.nivel2','indicador.Nivel4.nivel3.nivel2.nivel1','indicador.Nivel4.nivel3.nivel2.nivel1.plandesarrollo','indicador.Nivel4.entidadOficina')
                            ->get();

        //Carga TODO el plan indicativo - Vigencia 2020 (Codigo ID N° 12) - PARA MOSTRAR LOS REZAGOS
        $planIndicativoRezago2020 = PlanIndicativo::orderBy('vigencia_id')
                                    ->where('vigencia_id', '=', "12")
                                    ->with('indicador','vigencia','indicador.unidadMedida','indicador.Medida', 'indicador.Tipo', 'indicador.Nivel4', 'indicador.Nivel4.nivel3', 'indicador.Nivel4.nivel3.nivel2','indicador.Nivel4.nivel3.nivel2.nivel1','indicador.Nivel4.nivel3.nivel2.nivel1.plandesarrollo','indicador.Nivel4.entidadOficina')
                                    ->get();

        //Carga TODO el plan de accion (TODAS las acciones inscritas)
        $planAccion = PlanAccion::orderBy('plan_indicativo_id')
                            ->with('planIndicativo')
                            ->get();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();
        return view('planaccion.listarplanaccion2021', compact('planDesarrollo','planDesarrolloNivel4','medicionIndicador','planIndicativo','planIndicativoRezago2020','planAccion','entidadOficina','pagination'));
    }

    /**
     * VIGENCIA 2020 - Listar GLOBALMENTE todos los registros del nivel 4 ( Actividades o Metas ) - Para REPORTAR
     * @return \Illuminate\Http\Response
     */
    public function listarRegistrosReporte2020()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();

        //Hace una primer busqueda GENERAL
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')->paginate(1);

        //Valida si trae un filtro de busqueda por Secretaria | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                        ->where('oficina_id', $_GET['filtroSecretaria'])
                                        ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                        ->paginate(1);
                                        
        if ((isset($_GET['filtroactividad'])) && ($_GET['filtroactividad'] != '')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('numeral', $_GET['filtroactividad'])
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(1);

        if ((isset($_GET['filtropalabras'])) && ($_GET['filtropalabras'] != '')){ 
            $filtropalabra = $_GET['filtropalabras'];
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('nombre', 'LIKE', "%$filtropalabra%")
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(1);
        }
        
        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $planDesarrolloNivel4->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODOS los indicadores
        $medicionIndicador = MedicionIndicador::orderBy('nivel4_id')
                        ->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')
                        ->get(); 

        //Carga TODO el plan indicativo
        $planIndicativo = PlanIndicativo::orderBy('indicador_id') //! vigencia_id cambia segun la vigencia
                            ->where('vigencia_id','=','12')
                            ->with('indicador','vigencia','indicador.unidadMedida','indicador.Medida', 'indicador.Tipo', 'indicador.Nivel4', 'indicador.Nivel4.nivel3', 'indicador.Nivel4.nivel3.nivel2','indicador.Nivel4.nivel3.nivel2.nivel1','indicador.Nivel4.nivel3.nivel2.nivel1.plandesarrollo','indicador.Nivel4.entidadOficina')
                            ->get();

        //Carga TODO el plan de accion (TODAS las acciones inscritas)
        $planAccion = PlanAccion::orderBy('plan_indicativo_id')
                            ->with('planIndicativo')
                            ->get();

        //Carga TODAS las Tareas
        $tarea = Tarea::orderBy('id')->get();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();
        
        return view('planaccion.listarplanaccionreporte2020', compact('planDesarrollo','planDesarrolloNivel4','medicionIndicador','planIndicativo','planAccion', 'tarea','entidadOficina','pagination'));
    }

    /**
     * VIGENCIA 2021 - Listar GLOBALMENTE todos los registros del nivel 4 ( Actividades o Metas ) - Para REPORTAR 
     * @return \Illuminate\Http\Response
     */
    public function listarRegistrosReporte2021()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();

        //Hace una primer busqueda GENERAL
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')->paginate(1);

        //Valida si trae un filtro de busqueda por Secretaria | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                        ->where('oficina_id', $_GET['filtroSecretaria'])
                                        ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                        ->paginate(1);
                                        
        if ((isset($_GET['filtroactividad'])) && ($_GET['filtroactividad'] != '')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('numeral', $_GET['filtroactividad'])
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(1);

        if ((isset($_GET['filtropalabras'])) && ($_GET['filtropalabras'] != '')){ 
            $filtropalabra = $_GET['filtropalabras'];
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('nombre', 'LIKE', "%$filtropalabra%")
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(1);
        }
        
        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $planDesarrolloNivel4->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODOS los indicadores
        $medicionIndicador = MedicionIndicador::orderBy('nivel4_id')
                        ->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')
                        ->get(); 

        //Carga TODO el plan indicativo //! vigencia_id cambia segun la vigencia
        $planIndicativo = PlanIndicativo::orderBy('indicador_id')
                            ->where('vigencia_id','=','13')
                            ->with('indicador','vigencia','indicador.unidadMedida','indicador.Medida', 'indicador.Tipo', 'indicador.Nivel4', 'indicador.Nivel4.nivel3', 'indicador.Nivel4.nivel3.nivel2','indicador.Nivel4.nivel3.nivel2.nivel1','indicador.Nivel4.nivel3.nivel2.nivel1.plandesarrollo','indicador.Nivel4.entidadOficina')
                            ->get();

        //Carga TODO el plan indicativo - Vigencia 2020 (Codigo ID N° 12) - PARA MOSTRAR LOS REZAGOS
        $planIndicativoRezago2020 = PlanIndicativo::orderBy('vigencia_id')
                                    ->where('vigencia_id', '=', "12")
                                    ->with('indicador','vigencia','indicador.unidadMedida','indicador.Medida', 'indicador.Tipo', 'indicador.Nivel4', 'indicador.Nivel4.nivel3', 'indicador.Nivel4.nivel3.nivel2','indicador.Nivel4.nivel3.nivel2.nivel1','indicador.Nivel4.nivel3.nivel2.nivel1.plandesarrollo','indicador.Nivel4.entidadOficina')
                                    ->get();              

        //Carga TODO el plan de accion (TODAS las acciones inscritas)
        $planAccion = PlanAccion::orderBy('plan_indicativo_id')
                            ->with('planIndicativo')
                            ->get();

        //Carga TODAS las Tareas
        $tarea = Tarea::orderBy('id')->get();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();
        
        return view('planaccion.listarplanaccionreporte2021', compact('planDesarrollo','planDesarrolloNivel4','medicionIndicador','planIndicativo','planIndicativoRezago2020','planAccion', 'tarea','entidadOficina','pagination'));
    }

    /**
     * Listar GLOBALMENTE el avance de los PLANES DE ACCION
     * @return \Illuminate\Http\Response
     */
    public function listarAvancePlanAccion()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();

        //Hace una primer busqueda GENERAL
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')->paginate(1000);

        //Valida si trae un filtro de busqueda por Secretaria | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                        ->where('oficina_id', $_GET['filtroSecretaria'])
                                        ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                        ->paginate(1000);
                                        
        if ((isset($_GET['filtroactividad'])) && ($_GET['filtroactividad'] != '')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('numeral', $_GET['filtroactividad'])
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(1000);

        if ((isset($_GET['filtropalabras'])) && ($_GET['filtropalabras'] != '')){ 
            $filtropalabra = $_GET['filtropalabras'];
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('nombre', 'LIKE', "%$filtropalabra%")
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(1000);
        }
        
        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $planDesarrolloNivel4->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODOS los indicadores
        $medicionIndicador = MedicionIndicador::orderBy('nivel4_id')
                        ->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')
                        ->get(); 

        //Carga TODO el plan indicativo
        $planIndicativo = PlanIndicativo::orderBy('vigencia_id')
                            ->with('indicador','vigencia','indicador.unidadMedida','indicador.Medida', 'indicador.Tipo', 'indicador.Nivel4', 'indicador.Nivel4.nivel3', 'indicador.Nivel4.nivel3.nivel2','indicador.Nivel4.nivel3.nivel2.nivel1','indicador.Nivel4.nivel3.nivel2.nivel1.plandesarrollo','indicador.Nivel4.entidadOficina')
                            ->get();

        //Carga TODO el plan de accion (TODAS las acciones inscritas)
        $planAccion = PlanAccion::orderBy('plan_indicativo_id')
                            ->with('planIndicativo')
                            ->get();

        //Carga TODAS las Tareas
        $tarea = Tarea::orderBy('id')->get();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();
        
        return view('planaccion.listaravanceplanaccion', compact('planDesarrollo','planDesarrolloNivel4','medicionIndicador','planIndicativo','planAccion', 'tarea','entidadOficina','pagination'));
    }

}
