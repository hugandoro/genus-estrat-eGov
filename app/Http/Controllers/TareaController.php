<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PlanDesarrollo;
use App\PlanDesarrolloNivel1;
use App\PlanDesarrolloNivel2;
use App\PlanDesarrolloNivel3;
use App\PlanDesarrolloNivel4;
use App\EntidadOficina;

use App\Tarea;
use App\PlanAccion;
use App\PlanIndicativo;
use App\MedicionIndicador;

use App\GeneralZona;
use App\GeograficaComuna;
use App\GeograficaCorregimiento;
use App\GeneralPoblacion;
use App\GeneralSexo;
use App\GeneralFuente;

use App\Exports\Tareas2020Export;
use App\Exports\Tareas2021Export;
use App\Exports\Informe2020TipoUnoExport;
use App\Exports\Informe2021TipoUnoExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TareaController extends Controller
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
        return redirect('/planaccionlistarreporte');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarea = Tarea::all();

        $generalZona = GeneralZona::all();
        $geograficaComuna = GeograficaComuna::all();
        $geograficaCorregimiento = GeograficaCorregimiento::all();
        $generalPoblacion = GeneralPoblacion::all();
        $generalSexo = GeneralSexo::all();
        $generalFuente = GeneralFuente::all();

        return view('tarea.create', compact('tarea','generalZona','geograficaComuna','geograficaCorregimiento','generalPoblacion','generalSexo', 'generalFuente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarea = new Tarea;
 
        $tarea->fecha_realizacion = $request->fecha_realizacion;
        $tarea->descripcion = $request->descripcion;
        $tarea->accion_id = $request->accion_id;
        $tarea->zona_id = $request->zona_id;
        $tarea->comuna_id = $request->comuna_id;
        $tarea->corregimiento_id = $request->corregimiento_id;
        $tarea->poblacion_id = $request->poblacion_id;
        $tarea->sexo_id = $request->sexo_id;
        $tarea->poblacion = $request->poblacion;
        $tarea->impacto_kpi = $request->impacto_kpi;

        $tarea->valor_fuente1 = $request->valor_fuente1;
        $tarea->fuente1_id = $request->fuente1_id;
        $tarea->valor_fuente2 = $request->valor_fuente2;
        $tarea->fuente2_id = $request->fuente2_id;
        $tarea->valor_fuente3 = $request->valor_fuente3;
        $tarea->fuente3_id = $request->fuente3_id;

        $tarea->user_id = Auth::user()->id;

        //Valida el tamaño del archivo anexo
        $validator = Validator::make($request->all(), [
            'evidencia_pdf' => 'max:3000',
        ]);

        //Valida si no fallo por tamaño o por ser NULL
        if(($validator->fails()) || ($request->evidencia_pdf == NULL)){
            Session::flash('messageA', 'Tarea guardada con NOVEDAD | No se cargo evidencia o el PDF supera las 3 megas como tamaño maximo permitido');
            $tarea->evidencia_pdf = 'Sin evidencia';
            $tarea->save();
        }
        else{
            Session::flash('messageB', 'Tarea guardada correctamente con evidencia');
            $tarea->evidencia_pdf = $request->file('evidencia_pdf');
            $nombreArchivo = 'accion-' . $tarea->accion_id . '-' . uniqid() . '.pdf';
            Storage::disk('evidence')->put($nombreArchivo, file($tarea->evidencia_pdf));
            $tarea->evidencia_pdf = $nombreArchivo;

            $tarea->save();
        }

        //Obtiene el codigo del NIVEL4 al que debe regresar en el listado
        $planAccion = PlanAccion::find($tarea->accion_id);
        $planIndicativo = PlanIndicativo::find($planAccion->plan_indicativo_id);
        $medicionIndicador = MedicionIndicador::find($planIndicativo->indicador_id);
        $nivel4 = $medicionIndicador->nivel4_id;
        //----------------------------------------------------------------

        //Ejecuta regeneracion de medicion para los niveles relacionados con la tarea reportada
        $this->regenerarNivelEjecucionMeta($tarea->impacto_kpi, $tarea->accion_id, $planAccion->plan_indicativo_id, $planIndicativo->indicador_id);

        return redirect('/planaccionlistarreporte2021?filtroactividad='.$nivel4);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarea = Tarea::find($id);

        $generalZona = GeneralZona::all();
        $geograficaComuna = GeograficaComuna::all();
        $geograficaCorregimiento = GeograficaCorregimiento::all();
        $generalPoblacion = GeneralPoblacion::all();
        $generalSexo = GeneralSexo::all();
        $generalFuente = GeneralFuente::all();

        return view('tarea.show',compact('generalZona','geograficaComuna','geograficaCorregimiento','generalPoblacion','generalSexo','generalFuente'),['tarea'=>$tarea]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);

        $generalZona = GeneralZona::all();
        $geograficaComuna = GeograficaComuna::all();
        $geograficaCorregimiento = GeograficaCorregimiento::all();
        $generalPoblacion = GeneralPoblacion::all();
        $generalSexo = GeneralSexo::all();
        $generalFuente = GeneralFuente::all();

        return view('tarea.edit',compact('generalZona','geograficaComuna','geograficaCorregimiento','generalPoblacion','generalSexo','generalFuente'),['tarea'=>$tarea]);
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
        $tarea = Tarea::find($id);
 
        $tarea->fecha_realizacion = $request->fecha_realizacion;
        $tarea->descripcion = $request->descripcion;
        $tarea->zona_id = $request->zona_id;
        $tarea->comuna_id = $request->comuna_id;
        $tarea->corregimiento_id = $request->corregimiento_id;
        $tarea->poblacion_id = $request->poblacion_id;
        $tarea->sexo_id = $request->sexo_id;
        $tarea->poblacion = $request->poblacion;
        $tarea->impacto_kpi = $request->impacto_kpi;

        $tarea->valor_fuente1 = $request->valor_fuente1;
        $tarea->fuente1_id = $request->fuente1_id;
        $tarea->valor_fuente2 = $request->valor_fuente2;
        $tarea->fuente2_id = $request->fuente2_id;
        $tarea->valor_fuente3 = $request->valor_fuente3;
        $tarea->fuente3_id = $request->fuente3_id;
        
        $tarea->user_id = Auth::user()->id;

        $tarea->save();

        //Obtiene el codigo del NIVEL4 al que debe regresar en el listado
        $planAccion = PlanAccion::find($tarea->accion_id);
        $planIndicativo = PlanIndicativo::find($planAccion->plan_indicativo_id);
        $medicionIndicador = MedicionIndicador::find($planIndicativo->indicador_id);
        $nivel4 = $medicionIndicador->nivel4_id;
        //----------------------------------------------------------------

        //Ejecuta regeneracion de medicion para los niveles relacionados con la tarea reportada
        $this->regenerarNivelEjecucionMeta($tarea->impacto_kpi, $tarea->accion_id, $planAccion->plan_indicativo_id, $planIndicativo->indicador_id);
     
        return redirect('/planaccionlistarreporte2021?filtroactividad='.$nivel4);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = Tarea::find($id);

        //Obtiene el codigo del NIVEL4 al que debe regresar en el listado
        $planAccion = PlanAccion::find($tarea->accion_id);
        $planIndicativo = PlanIndicativo::find($planAccion->plan_indicativo_id);
        $medicionIndicador = MedicionIndicador::find($planIndicativo->indicador_id);
        $nivel4 = $medicionIndicador->nivel4_id;
        //----------------------------------------------------------------

        Storage::disk('evidence')->delete($tarea->evidencia_pdf);
        Tarea::destroy($id);  

        //Ejecuta regeneracion de medicion para los niveles relacionados con la tarea reportada
        $this->regenerarNivelEjecucionMeta($tarea->impacto_kpi, $tarea->accion_id, $planAccion->plan_indicativo_id, $planIndicativo->indicador_id);

        return redirect('/planaccionlistarreporte2021?filtroactividad='.$nivel4);

    }

    /**
     * Listar GLOBALMENTE todos los registros del nivel 4 ( Actividades o Metas ) - Vigencia 2020
     * @return \Illuminate\Http\Response
     */
    public function listarRegistros2020()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();

        //Hace una primer busqueda GENERAL
        $tarea = Tarea::orderBy('id','desc')->with('accion','accion.planIndicativo','accion.planIndicativo.vigencia','accion.planIndicativo.indicador','accion.planIndicativo.indicador.Nivel4','accion.planIndicativo.indicador.Nivel4.entidadOficina')
                                            ->where('accion_id','<','1325') //! Vigencia 2020 - Plan Accion ID entre del 1 al 1324 
                                            ->get();
        $totalTareas = count($tarea);

        //Hace una segunda busqueda GENERAL con resultado paginados
        $tarea = Tarea::orderBy('id','desc')->with('accion','accion.planIndicativo','accion.planIndicativo.vigencia','accion.planIndicativo.indicador','accion.planIndicativo.indicador.Nivel4','accion.planIndicativo.indicador.Nivel4.entidadOficina')
                                            ->where('accion_id','<','1325') //! Vigencia 2020 - Plan Accion ID entre del 1 al 1324 
                                            ->paginate(10);

        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $tarea->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();

        return view('tarea.listargeneral2020', compact('planDesarrollo','tarea','entidadOficina','pagination', 'totalTareas'));
    }

    /**
     * Listar GLOBALMENTE todos los registros del nivel 4 ( Actividades o Metas ) - Vigencia 2021
     * @return \Illuminate\Http\Response
     */
    public function listarRegistros2021()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();

        //Hace una primer busqueda GENERAL
        $tarea = Tarea::orderBy('id','desc')->with('accion','accion.planIndicativo','accion.planIndicativo.vigencia','accion.planIndicativo.indicador','accion.planIndicativo.indicador.Nivel4','accion.planIndicativo.indicador.Nivel4.entidadOficina')
                                            ->where('accion_id','>','1324') //! Vigencia 2021 - Plan Accion ID entre del 1325 al 2501
                                            ->get();
        $totalTareas = count($tarea);

        //Hace una segunda busqueda GENERAL con resultado paginados
        $tarea = Tarea::orderBy('id','desc')->with('accion','accion.planIndicativo','accion.planIndicativo.vigencia','accion.planIndicativo.indicador','accion.planIndicativo.indicador.Nivel4','accion.planIndicativo.indicador.Nivel4.entidadOficina')
                                            ->where('accion_id','>','1324') //! Vigencia 2021 - Plan Accion ID entre del 1325 al 2501
                                            ->paginate(10);

        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $tarea->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();

        return view('tarea.listargeneral2021', compact('planDesarrollo','tarea','entidadOficina','pagination', 'totalTareas'));
    }    

    public function listarRegistrosExcel2020()
    {
        return Excel::download(new Tareas2020Export, 'tareas.xlsx');
    }

    public function listarRegistrosExcel2021()
    {
        return Excel::download(new Tareas2021Export, 'tareas.xlsx');
    }

    public function informeTipoUnoExcel2020()
    {
        return Excel::download(new Informe2020TipoUnoExport, 'informe_tipo_uno_2020.xlsx');
    }

    public function informeTipoUnoExcel2021()
    {
        return Excel::download(new Informe2021TipoUnoExport, 'informe_tipo_uno_2021.xlsx');
    }

    /**
     * Calcula y regenera niveles (Para UNA meta) de ejecucion tablas PLAN ACCION -> PLAN INDICATIVO -> INDICADOR 
     * @return \Illuminate\Http\Response
     */
    public function regenerarNivelEjecucionMeta($tareaImpactoKPI, $IDplanAccion, $IDplanIndicativo, $IDmedicionIndicador)
    {
        //Ampliacion a 10 minutos el limite de tiempo por ser una consulta extensa
        set_time_limit(600);

        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))
                            ->with('administracion')
                            ->get();

        //Carga el indicador respectivo
        $medicionIndicador = MedicionIndicador::find($IDmedicionIndicador);

        //Carga el plan indicativo respectivo
        $planIndicativo = PlanIndicativo::find($IDplanIndicativo);

        //Carga las acciones respectivas
        $planAccion = PlanAccion::orderBy('plan_indicativo_id')
                            ->where('plan_indicativo_id', $planIndicativo->id)
                            ->get();
                          

        // Inicializa Contador acumulado de ponderacion por CAMBIO DE ITEM PLAN INDICATIVO
        $acumProporcionalPonderadoAccion = 0;

        //* Recorreo todas las ACCIONES relacionadas con el PLAN INDICATIVO 
        foreach ($planAccion as $accion) {

            // Inicializa Contador acumulado de impacto KPI tareas reportadas
            $acumImpactoKPI = 0;
            // Inicializa por defecto en 0% una variable para almacenar "% de Cumplimiento accion"
            $auxCumplimientoAccion = 0;
            //Carga las tareas relacionadas con la accion
            $tareasRelacionadas = Tarea::orderBy('id')
                        ->where('accion_id', $accion->id)
                        ->get();


            // *** INICIO calculo ACUMULADORES
            //* Recorreo todas las TAREAS relacionadas con cada ACCION
            foreach ($tareasRelacionadas as $registro) {
                $acumImpactoKPI = $acumImpactoKPI + $registro->impacto_kpi; // Acumula el impacto al KPI reportado en las tareas
            }

            // Verifica para evitar division Zero cuando no se tiene objetivo
            if (($accion->objetivo != '') && ($accion->objetivo > '0')) {

                // Variable auxiliar "% de Cumplimiento accion" para posterior calculo del proporcional al ponderado
                $auxCumplimientoAccion = ($acumImpactoKPI * 1) / $accion->objetivo;

            }
            // *** FIN calculo ACUMULADORES

            // *** INICIO calculo PONDERADOS
            // Evita division Zero cuando no se tiene objetivo
            if (($accion->objetivo != '') && ($accion->objetivo > '0'))
                $proporcionalPonderadoAccion = ($auxCumplimientoAccion * $accion->ponderacion) / 1;
            else 
                $proporcionalPonderadoAccion = 0;


            // Valida y en caso de sobreejecucion del ponderado limita al valor maximo inscrito como ponderado para la accion
            if ($proporcionalPonderadoAccion > $accion->ponderacion ) $proporcionalPonderadoAccion = $accion->ponderacion;
                $acumProporcionalPonderadoAccion = $acumProporcionalPonderadoAccion + $proporcionalPonderadoAccion;
            // *** FIN calculo PONDERADOS


            //? --------------------------------------------------------------------------------------------------
            //? FASE NUMERO - 1
            //? ALMACENA niveles de avance DIRECTAMENTE en la 3 ultimas columnas de la TABLA PLAN ACCION
            //? Regenera las columnas valor_realizado | porcentaje_realizado | rezago de la tabla plan_accions
            //? --------------------------------------------------------------------------------------------------
            $auxPlanAccion = PlanAccion::find($accion->id);
            $auxPlanAccion->valor_realizado = $acumImpactoKPI;
            $auxPlanAccion->porcentaje_realizado = $auxCumplimientoAccion;
            $auxPlanAccion->ponderado_realizado = $proporcionalPonderadoAccion;
            $auxPlanAccion->rezago = $accion->objetivo - $auxPlanAccion->valor_realizado;
            $auxPlanAccion->save();
            //? FIN ----------------------------------------------------------------------------------------------

        }


        // Diferente de CERO - Calcula dividiendo por el objetivo
        if ($medicionIndicador->objetivo != 0) {

            // Calcula el impacto al indicador en cantidades y en terminos de porcentajes
            $impactoIndicador = ($planIndicativo->valor * $acumProporcionalPonderadoAccion) / 1;
            $porcentajeImpactoIndicador = (($impactoIndicador * 1) / $medicionIndicador->objetivo);
        }

        // CERO y tipo MANTENIMIENTO - Calcula dividiendo por la linea base multiplicado por 4
        if (($medicionIndicador->objetivo == 0) && ($medicionIndicador->tipo_id == 3)) {

            // Calcula el impacto al indicador en cantidades y en terminos de porcentajes
            $impactoIndicador = ($planIndicativo->valor * $acumProporcionalPonderadoAccion) / 1;
            $porcentajeImpactoIndicador = (($impactoIndicador * 1) / ($medicionIndicador->linea_base * 4)); // Nor remitimos a la linea base por ser de Mantenimiento

        }

        // CERO y tipo NO MANTENIMIENTO - Igual a cero
        if (($medicionIndicador->objetivo == 0) && ($medicionIndicador->tipo_id != 3)) {

            // Calcula el impacto al indicador en cantidades y en terminos de porcentajes
            $impactoIndicador = 0; // Se lleva a 0 unidades por ser aciones informativas sin objetivo en el indicador para medir
            $porcentajeImpactoIndicador = 0; // Se lleva a 0 % por ser aciones informativas sin objetivo en el indicador para medir

        }

        //? --------------------------------------------------------------------------------------------------
        //? FASE NUMERO - 2
        //? ALMACENA niveles de avance DIRECTAMENTE en la 3 ultimas columnas de la TABLA PLAN INDICATIVO
        //? Regenera las columnas valor_realizado | porcentaje_realizado | rezago de la tabla plan_indicativos
        //? --------------------------------------------------------------------------------------------------
        $auxPlanIndicativo = PlanIndicativo::find($planIndicativo->id);
        $auxPlanIndicativo->valor_realizado = (($planIndicativo->valor * $acumProporcionalPonderadoAccion) / 1);
        if ($planIndicativo->valor != 0)
        $auxPlanIndicativo->porcentaje_realizado = (($auxPlanIndicativo->valor_realizado * 1) / $planIndicativo->valor);
        else
        $auxPlanIndicativo->porcentaje_realizado = 'NP';
        $auxPlanIndicativo->rezago = $planIndicativo->valor - $auxPlanIndicativo->valor_realizado;
        $auxPlanIndicativo->save();
        //? FIN ----------------------------------------------------------------------------------------------


        //? --------------------------------------------------------------------------------------------------
        //? FASE NUMERO - 3
        //? ALMACENA niveles de avance DIRECTAMENTE en la 3 ultimas columnas de la TABLA MEDICION INDICADORES
        //? Regenera las columnas valor_realizado | porcentaje_realizado | rezago de la tabla medicion_indicadors
        //? --------------------------------------------------------------------------------------------------
        $auxIndicador = MedicionIndicador::find($medicionIndicador->id);
        //? Recorre y acumula el valor realizado en las 4 vigencias del plan indicativo
        $auxPlanIndicativo = PlanIndicativo::orderBy('id')
                            ->where('indicador_id', $medicionIndicador->id)
                            ->get();

        $auxIndicador->valor_realizado = 0;
        foreach ($auxPlanIndicativo as $indicativo){
            $auxIndicador->valor_realizado = $auxIndicador->valor_realizado + $indicativo->valor_realizado;
        }
        //? Calcula en porcentaje realizado teniendo presente el caso especial tipo_id N° 3 MANTENIMIENTO
        if ($medicionIndicador->tipo_id == 3)
            $auxIndicador->porcentaje_realizado = ($auxIndicador->valor_realizado * 1) / ($auxIndicador->linea_base * 4);
        else
            $auxIndicador->porcentaje_realizado = ($auxIndicador->valor_realizado * 1) / $auxIndicador->objetivo;

        //? Calcula el rezago respectivo teniendo presente el caso especial tipo_id N° 3 MANTENIMIENTO
        if ($medicionIndicador->tipo_id == 3)
            $auxIndicador->rezago = ($medicionIndicador->linea_base * 2) - $auxIndicador->valor_realizado; //! OJO AJUSTE MANUAL - Se multiplica por el N° de la vigencia actual (1,2..4)
        else
            $auxIndicador->rezago = $medicionIndicador->objetivo - $auxIndicador->valor_realizado;
        $auxIndicador->save();
        //? FIN ----------------------------------------------------------------------------------------------

    } 

}
