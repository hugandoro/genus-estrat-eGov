<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarea;
use App\PlanAccion;
use App\PlanIndicativo;
use App\MedicionIndicador;

use App\GeneralZona;
use App\GeograficaComuna;
use App\GeograficaCorregimiento;
use App\GeneralPoblacion;
use App\GeneralSexo;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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

        return view('tarea.create', compact('tarea','generalZona','geograficaComuna','geograficaCorregimiento','generalPoblacion','generalSexo'));
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

        //Valida el tamaño del archivo anexo
        $validator = Validator::make($request->all(), [
            'evidencia_pdf' => 'max:2048000',
        ]);

        //Valida si no fallo por tamaño o por ser NULL
        if(($validator->fails()) || ($request->evidencia_pdf == NULL)){
            $tarea->evidencia_pdf = 'Sin evidencia';
            $tarea->save();
        }
        else{
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
     
        return redirect('/planaccionlistarreporte?filtroactividad='.$nivel4);
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

        return view('tarea.show',compact('generalZona','geograficaComuna','geograficaCorregimiento','generalPoblacion','generalSexo'),['tarea'=>$tarea]);
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

        return view('tarea.edit',compact('generalZona','geograficaComuna','geograficaCorregimiento','generalPoblacion','generalSexo'),['tarea'=>$tarea]);
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

        $tarea->save();

        //Obtiene el codigo del NIVEL4 al que debe regresar en el listado
        $planAccion = PlanAccion::find($tarea->accion_id);
        $planIndicativo = PlanIndicativo::find($planAccion->plan_indicativo_id);
        $medicionIndicador = MedicionIndicador::find($planIndicativo->indicador_id);
        $nivel4 = $medicionIndicador->nivel4_id;
        //----------------------------------------------------------------
     
        return redirect('/planaccionlistarreporte?filtroactividad='.$nivel4);
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
 
        return redirect('/planaccionlistarreporte?filtroactividad='.$nivel4);

    }
}
