<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\MedicionIndicador;
Use App\MedicionUnidadMedida;
Use App\GeneralVigencia;
Use App\MedicionMedida;
Use App\MedicionTipo;
Use App\PlanDesarrolloNivel1;
Use App\PlanDesarrolloNivel2;
Use App\PlanDesarrolloNivel3;
Use App\PlanDesarrolloNivel4;
use Illuminate\Support\Facades\DB;

class MedicionIndicadorController extends Controller
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
    public function create()
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
        $medicionIndicador = MedicionIndicador::find($id);

        $medicionUnidadMedida = MedicionUnidadMedida::all();
        $generalVigencia = GeneralVigencia::all();
        $medicionMedida = MedicionMedida::all();
        $medicionTipo = MedicionTipo::all();

        //* ARBOL INVERSO PARA OBTENER LOS 4 ID DE LOS NIVELES Y PODER UTILIZARLOS PARA ARMAR POSTERIOR RUTA DE REGRESO
        //* Realiza busqueda inversa para armar el arbol de niveles para las rutas
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::where('id', $medicionIndicador->nivel4_id)->get();
        //* Toma el primer registro para no enviar un array de resultados SOLO un resultado para tomar el Id del nivel 3
        $planDesarrolloNivel4 = $planDesarrolloNivel4[0];
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::where('id', $planDesarrolloNivel4->nivel3_id)->get();
        $planDesarrolloNivel3 = $planDesarrolloNivel3[0];
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::where('id', $planDesarrolloNivel3->nivel2_id)->get();
        $planDesarrolloNivel2 = $planDesarrolloNivel2[0];

        //Llamada a EDICION enviando entre otros parametros los 4 ID de los niveles del arbol del plan para armar ruta de regreso posterior
        return view('indicador.edit',compact('medicionUnidadMedida','generalVigencia','medicionMedida','medicionTipo'),['medicionIndicador'=>$medicionIndicador, 'planDesarrolloNivel2'=>$planDesarrolloNivel2, 'planDesarrolloNivel3'=>$planDesarrolloNivel3, 'planDesarrolloNivel4'=>$planDesarrolloNivel4]);
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
        $medicionIndicador = MedicionIndicador::find($id);
 
        $medicionIndicador->nombre = $request->nombre; 
        $medicionIndicador->unidad_medida_id = $request->unidad_medida;
        $medicionIndicador->linea_base = $request->linea_base;
        $medicionIndicador->vigencia_id_base = $request->vigencia_linea_base; 
        $medicionIndicador->meta = $request->meta_2023;
        $medicionIndicador->objetivo = $request->meta_cuatrienio;
        $medicionIndicador->medida_id = $request->medida;
        $medicionIndicador->tipo_id = $request->tipo;
     
        $medicionIndicador->save();
     
        return redirect('plandesarrollonivel4/hojadevida/'.$request->nivel1_id.'/'.$request->nivel2_id.'/'.$request->nivel3_id.'/'.$request->nivel4_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MedicionIndicador::destroy($id);  
        //* No redirecciona, este metodo es invocado al eliminarce un registro Nivel 4
    }

    /**
     * Crear un indicador por defecto
     *
     * @return \Illuminate\Http\Response
     */
    public function crearIndicadorInicial($id)
    {
        $medicionIndicador = new MedicionIndicador;
    
        $medicionIndicador->nombre = 'Indicador por defecto'; 
        $medicionIndicador->unidad_medida_id = 1;
        $medicionIndicador->linea_base = 0;
        $medicionIndicador->vigencia_id_base = 4; 
        $medicionIndicador->meta = 4;
        $medicionIndicador->objetivo = 4;
        $medicionIndicador->medida_id = 1;
        $medicionIndicador->tipo_id = 1;
        $medicionIndicador->nivel4_id = $id;

        $medicionIndicador->save();
        //* No redirecciona, el metodo crea un indicador por defecto y es invocado al grabar un nuevo registro de nivel 4
    }


}
