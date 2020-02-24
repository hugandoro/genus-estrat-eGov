<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlanDesarrollo;
use App\PlanDesarrolloNivel1;
use App\PlanDesarrolloNivel2;
use App\PlanDesarrolloNivel3;
use App\PlanDesarrolloNivel4;
use App\EntidadOficina;
use Illuminate\Support\Facades\DB;

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
        //Realiza busqueda inversa para armar el arbol de niveles para las rutas
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::where('id', $planDesarrolloNivel3->nivel2_id)->get();
        //Toma el primer registro para no enviar un array de resultados SOLO un resultado para tomar el Id del nivel 1
        $planDesarrolloNivel2 = $planDesarrolloNivel2[0];
        
        PlanDesarrolloNivel4::destroy($id);        
 
        return redirect('plandesarrollonivel3/listar/'.$planDesarrolloNivel2->nivel1_id.'/'.$planDesarrolloNivel3->nivel2_id.'/'.$planDesarrolloNivel4->nivel3_id);
    }

}
