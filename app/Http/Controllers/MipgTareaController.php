<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PlanDesarrollo;
use App\ModuloMipgNivel1;
use App\ModuloMipgNivel2;
use App\ModuloMipgNivel3;
use App\ModuloMipgNivel4;
use App\EntidadOficina;

use App\ModuloMipgTarea;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MipgTareaController extends Controller
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
        return redirect('/mipgplanaccionlistarreporte2022');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarea = ModuloMipgTarea::all();

        return view('modulomipgtarea.create', compact('tarea'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarea = new ModuloMipgTarea;

        $tarea->fecha_realizacion = $request->fecha_realizacion;
        $tarea->descripcion = $request->descripcion;
        $tarea->nivel4_id = $request->nivel4_id;
        $tarea->impacto_kpi = $request->impacto_kpi;

        $tarea->user_id = Auth::user()->id;

        //Valida el tamaño del archivo anexo
        $validator = Validator::make($request->all(), [
            'evidencia_pdf' => 'max:3000',
        ]);

        //Valida si no fallo por tamaño o por ser NULL
        if (($validator->fails()) || ($request->evidencia_pdf == NULL)) {
            Session::flash('messageA', 'Tarea guardada con NOVEDAD | No se cargo evidencia o el PDF supera las 3 megas como tamaño maximo permitido');
            $tarea->evidencia_pdf = 'Sin evidencia';
            $tarea->save();
        } else {
            Session::flash('messageB', 'Tarea guardada correctamente con evidencia');
            $tarea->evidencia_pdf = $request->file('evidencia_pdf');
            $nombreArchivo = 'MIPG-accion-' . $tarea->nivel4_id . '-' . uniqid() . '.pdf';
            Storage::disk('evidence')->put($nombreArchivo, file($tarea->evidencia_pdf));
            $tarea->evidencia_pdf = $nombreArchivo;

            $tarea->save();
        }

        //Ejecuta regeneracion de medicion de cumplimiento
        $this->regenerarNivelEjecucionAccion($tarea->impacto_kpi, $tarea->nivel4_id);

        return redirect('/mipgplanaccionlistarreporte2022?filtroactividad=' . $tarea->nivel4->numeral);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarea = ModuloMipgTarea::find($id);

        return view('modulomipgtarea.show', ['tarea' => $tarea]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = ModuloMipgTarea::find($id);

        return view('modulomipgtarea.edit', ['tarea' => $tarea]);
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
        $tarea = ModuloMipgTarea::find($id);

        $tarea->fecha_realizacion = $request->fecha_realizacion;
        $tarea->descripcion = $request->descripcion;
        $tarea->impacto_kpi = $request->impacto_kpi;

        $tarea->user_id = Auth::user()->id;

        $tarea->save();

        //Ejecuta regeneracion de medicion de cumplimiento
        $this->regenerarNivelEjecucionAccion($tarea->impacto_kpi, $tarea->nivel4_id);

        return redirect('/mipgplanaccionlistarreporte2022?filtroactividad=' . $tarea->nivel4->numeral);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = ModuloMipgTarea::find($id);

        Storage::disk('evidence')->delete($tarea->evidencia_pdf);
        ModuloMipgTarea::destroy($id);

        //Ejecuta regeneracion de medicion de cumplimiento
        $this->regenerarNivelEjecucionAccion($tarea->impacto_kpi, $tarea->nivel4_id);

        return redirect('/mipgplanaccionlistarreporte2022?filtroactividad=' . $tarea->nivel4->numeral);
    }

    /**
     * Calcula y regenera niveles (Para UNA ACCION MIPG)
     * @return \Illuminate\Http\Response
     */
    public function regenerarNivelEjecucionAccion($tareaImpactoKPI, $IDplanAccion)
    {
        // Ampliacion a 10 minutos el limite de tiempo por ser una consulta extensa
        set_time_limit(600);

        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))
            ->with('administracion');

        // Carga las acciones respectivas de la viogencia 2022 ( Codigo 14 )
        $planAccion = ModuloMipgNivel4::orderBy('id')
            ->where('vigencia_id', '14')
            ->get();

        // Recorre todas las ACCIONES del PLAN ACCION MIPG vigencia 2022
        foreach ($planAccion as $accion) {

            // Inicializa Contador acumulado de impacto KPI tareas reportadas
            $acumImpactoKPI = 0;
            // Inicializa por defecto en 0% una variable para almacenar "% de Cumplimiento accion"
            $porcentajCumplimientoAccion = 0;
            // Carga las tareas relacionadas con la accion
            $tareasRelacionadas = ModuloMipgTarea::orderBy('id')
                ->where('nivel4_id', $accion->id)
                ->get();

            // Recorreo todas las TAREAS relacionadas con cada ACCION
            foreach ($tareasRelacionadas as $registro) {
                // Acumula el impacto al KPI reportado en las tareas
                $acumImpactoKPI = $acumImpactoKPI + $registro->impacto_kpi; 
            }

            // Verifica para evitar division Zero cuando no se tiene objetivo y  calcula PORTENTAJE DE CUMPLIMIENTO
            if (($accion->objetivo != '') && ($accion->objetivo > '0')) 
                $porcentajCumplimientoAccion = ($acumImpactoKPI * 1) / $accion->objetivo;

                $auxPlanAccion = ModuloMipgNivel4::find($accion->id);
                $auxPlanAccion->valor_realizado = $acumImpactoKPI;
                $auxPlanAccion->porcentaje_realizado = $porcentajCumplimientoAccion;
                $auxPlanAccion->rezago = $accion->objetivo - $auxPlanAccion->valor_realizado;
                $auxPlanAccion->save();

        }

    }
}
