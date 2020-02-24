<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlanDesarrollo;
use App\PlanDesarrolloNivel1;
use App\PlanDesarrolloNivel2;
use App\PlanDesarrolloNivel3;
use App\PlanDesarrolloNivel4;
use Illuminate\Support\Facades\DB;

class PlanDesarrolloNivel3Controller extends Controller
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
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::where('nivel2_id', $idNivel2)->get();
        return view('plandesarrollonivel3.create',compact('planDesarrollo'),['idNivel1' => $idNivel1, 'idNivel2' => $idNivel2],compact('planDesarrolloNivel3'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planDesarrolloNivel3 = new PlanDesarrolloNivel3;
 
        $planDesarrolloNivel3->numeral = $request->numeral;
        $planDesarrolloNivel3->nombre = $request->nombre;
        $planDesarrolloNivel3->objetivo = $request->objetivo;
        $planDesarrolloNivel3->nivel2_id = $request->nivel2_id; 
 
        $planDesarrolloNivel3->save();

        return redirect('plandesarrollonivel2/listar/'.$request->nivel1_id.'/'.$request->nivel2_id);
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
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::find($id);

        //Realiza busqueda inversa para armar el arbol de niveles para las rutas
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::where('id', $planDesarrolloNivel3->nivel2_id)->get();
        //Toma el primer registro para no enviar un array de resultados SOLO un resultado para tomar el Id del nivel 1
        $planDesarrolloNivel2 = $planDesarrolloNivel2[0];

        return view('plandesarrollonivel3.edit',compact('planDesarrollo'),['planDesarrolloNivel2'=>$planDesarrolloNivel2, 'planDesarrolloNivel3'=>$planDesarrolloNivel3]);
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
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::find($id);
 
        $planDesarrolloNivel3->numeral = $request->numeral;
        $planDesarrolloNivel3->nombre = $request->nombre;
        $planDesarrolloNivel3->objetivo = $request->objetivo;
     
        $planDesarrolloNivel3->save();
     
        return redirect('plandesarrollonivel2/listar/'.$request->nivel1_id.'/'.$request->nivel2_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::find($id);
        
        //Realiza busqueda inversa para armar el arbol de niveles para las rutas
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::where('id', $planDesarrolloNivel3->nivel2_id)->get();
        //Toma el primer registro para no enviar un array de resultados SOLO un resultado para tomar el Id del nivel 1
        $planDesarrolloNivel2 = $planDesarrolloNivel2[0];
        
        PlanDesarrolloNivel3::destroy($id);        
 
        return redirect('plandesarrollonivel2/listar/'.$planDesarrolloNivel2->nivel1_id.'/'.$planDesarrolloNivel3->nivel2_id);
    }

    /**
     * Listas todos los registros del nivel 4 qui tienen como padre NIVEL 3.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar($idA,$idB,$idC)
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::find($idA);
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::find($idB);
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::find($idC);
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::where('nivel3_id', $idC)->with('entidadOficina')->get();
        return view('plandesarrollonivel3.listar', compact('planDesarrollo','planDesarrolloNivel1','planDesarrolloNivel2','planDesarrolloNivel3','planDesarrolloNivel4'));
    }
}
