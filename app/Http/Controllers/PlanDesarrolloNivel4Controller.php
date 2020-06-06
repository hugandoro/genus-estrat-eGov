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
use App\RefOdsObjetivo;
use App\OdsNivel4;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MedicionIndicadorController;

class PlanDesarrolloNivel4Controller extends Controller
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
        $idNivel1 = $request->idNivel1;
        $idNivel2 = $request->idNivel2;
        $idNivel3 = $request->idNivel3;
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::where('nivel3_id', $idNivel3)->get();

        $entidadOficina = EntidadOficina::where('entidad_id',config('app.entidad'))->get();
  
        return view('plandesarrollonivel4.create',compact('entidadOficina','planDesarrollo'),['idNivel1' => $idNivel1, 'idNivel2' => $idNivel2, 'idNivel3' => $idNivel3],compact('planDesarrolloNivel4'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planDesarrolloNivel4 = new PlanDesarrolloNivel4;
 
        $planDesarrolloNivel4->numeral = $request->numeral;
        $planDesarrolloNivel4->nombre = $request->nombre;
        $planDesarrolloNivel4->objetivo = $request->objetivo;
        $planDesarrolloNivel4->nivel3_id = $request->nivel3_id; 
        $planDesarrolloNivel4->oficina_id = $request->oficina_id; 
 
        $planDesarrolloNivel4->save();

        //Obtener el ID del nuevo registro agregado
        $nivel4_id = $planDesarrolloNivel4->id;

        //* Llama un metodo de otro controlador directamente - En este caso de 'MedicionIndicadorController' para agregar el indicador por defecto  
        app('App\Http\Controllers\MedicionIndicadorController')->crearIndicadorInicial($nivel4_id);

        return redirect('plandesarrollonivel3/listar/'.$request->nivel1_id.'/'.$request->nivel2_id.'/'.$request->nivel3_id);
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
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::find($id);

        //Realiza busqueda inversa para armar el arbol de niveles para las rutas
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::where('id', $planDesarrolloNivel4->nivel3_id)->get();
        //Toma el primer registro para no enviar un array de resultados SOLO un resultado para tomar el Id del nivel 2
        $planDesarrolloNivel3 = $planDesarrolloNivel3[0];
        //Realiza busqueda inversa para armar el arbol de niveles para las rutas
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::where('id', $planDesarrolloNivel3->nivel2_id)->get();
        //Toma el primer registro para no enviar un array de resultados SOLO un resultado para tomar el Id del nivel 1
        $planDesarrolloNivel2 = $planDesarrolloNivel2[0];

        $entidadOficina = EntidadOficina::where('entidad_id',config('app.entidad'))->get();

        return view('plandesarrollonivel4.edit',compact('entidadOficina','planDesarrollo'),['planDesarrolloNivel2'=>$planDesarrolloNivel2, 'planDesarrolloNivel3'=>$planDesarrolloNivel3, 'planDesarrolloNivel4'=>$planDesarrolloNivel4]);
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
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::find($id);
 
        $planDesarrolloNivel4->numeral = $request->numeral;
        $planDesarrolloNivel4->nombre = $request->nombre;
        $planDesarrolloNivel4->objetivo = $request->objetivo;
        $planDesarrolloNivel4->oficina_id = $request->oficina_id; 
     
        $planDesarrolloNivel4->save();

        //Elimina los registros de relacion MUCHOS a MUCHOS
        //$planDesarrolloNivel4->ods()->detach ('1'); 
        //Vincula una relacion MUCHOS a MUCHOS
        //$planDesarrolloNivel4->ods()->attach ('1');
     
        return redirect('plandesarrollonivel3/listar/'.$request->nivel1_id.'/'.$request->nivel2_id.'/'.$request->nivel3_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::find($id);
        
        //Realiza busqueda inversa para armar el arbol de niveles para las rutas
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::where('id', $planDesarrolloNivel4->nivel3_id)->get();
        //Toma el primer registro para no enviar un array de resultados SOLO un resultado para tomar el Id del nivel 2
        $planDesarrolloNivel3 = $planDesarrolloNivel3[0];
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::where('id', $planDesarrolloNivel3->nivel2_id)->get();
        $planDesarrolloNivel2 = $planDesarrolloNivel2[0];
        
        //* Eliminar el controlador vinculado ANTES de eliminar el registro  
        app('App\Http\Controllers\MedicionIndicadorController')->destroy($id);

        PlanDesarrolloNivel4::destroy($id);   
   
 
        return redirect('plandesarrollonivel3/listar/'.$planDesarrolloNivel2->nivel1_id.'/'.$planDesarrolloNivel3->nivel2_id.'/'.$planDesarrolloNivel4->nivel3_id);
    }

    /**
     * Lista la HOJA DE VIDA completa de la meta.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrarHojaDeVida($idA,$idB,$idC,$idD)
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::find($idA);
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::find($idB);
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::find($idC);
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::find($idD);

        $indicador = MedicionIndicador::where('nivel4_id', $idD)->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')->get();

        $refOdsObjetivo = RefOdsObjetivo::all();
        $odsNivel4 = OdsNivel4::where('nivel4_id', $idD)->with('odsInformacion')->get();

        return view('plandesarrollonivel4.hojadevida', compact('planDesarrollo','planDesarrolloNivel1','planDesarrolloNivel2','planDesarrolloNivel3','planDesarrolloNivel4','indicador','refOdsObjetivo','odsNivel4'));
    }

    /**
     * Vincula ODS al NIVEL 4
     *
     * @return \Illuminate\Http\Response
     */
    public function vincularODS(Request $request)
    {
        //Recibe ID de cada nivel desde el formulario incluyendo el ID del indicador
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::find($request->nivel1_id);
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::find($request->nivel2_id);
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::find($request->nivel3_id);
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::find($request->nivel4_id);

        $indicador = MedicionIndicador::where('nivel4_id', $request->nivel4_id)->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')->get();

        //Elimina TODOS los registros de relacion MUCHOS a MUCHOS
        $planDesarrolloNivel4->ods()->detach ($request->ods_id); 
        //Si la funcion es vincular, ingresa un registro en la relacion MUCHOS a MUCHOS
        if ($request->funcion == 'vincular') $planDesarrolloNivel4->ods()->attach ($request->ods_id);

        //Obtiene datos para mostrar - Convergencia ODS
        $refOdsObjetivo = RefOdsObjetivo::all();
        $odsNivel4 = OdsNivel4::where('nivel4_id', $request->nivel4_id)->with('odsInformacion')->get();

        //Vuelve y cargar la vista de HOJA DE VIDA una vez vinculado a la tabla pivote la relacion con el ODS
        return view('plandesarrollonivel4.hojadevida', compact('planDesarrollo','planDesarrolloNivel1','planDesarrolloNivel2','planDesarrolloNivel3','planDesarrolloNivel4','indicador','refOdsObjetivo','odsNivel4'));
    }

}
