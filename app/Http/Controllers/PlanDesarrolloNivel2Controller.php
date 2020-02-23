<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlanDesarrollo;
use App\PlanDesarrolloNivel1;
use App\PlanDesarrolloNivel2;
use App\PlanDesarrolloNivel3;
use App\PlanDesarrolloNivel4;
use Illuminate\Support\Facades\DB;

class PlanDesarrolloNivel2Controller extends Controller
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
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::where('nivel1_id', $idNivel1)->get();
        return view('plandesarrollonivel2.create', compact('planDesarrollo','idNivel1','planDesarrolloNivel2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planDesarrolloNivel2 = new PlanDesarrolloNivel2;
 
        $planDesarrolloNivel2->numeral = $request->numeral;
        $planDesarrolloNivel2->nombre = $request->nombre;
        $planDesarrolloNivel2->objetivo = $request->objetivo;
        $planDesarrolloNivel2->nivel1_id = $request->nivel1_id; 
 
        $planDesarrolloNivel2->save();

        return redirect('plandesarrollonivel1/listar/'.$request->nivel1_id);
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
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::find($id);
        return view('plandesarrollonivel2.edit',compact('planDesarrollo'),['planDesarrolloNivel2'=>$planDesarrolloNivel2]);
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
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::find($id);
 
        $planDesarrolloNivel2->numeral = $request->numeral;
        $planDesarrolloNivel2->nombre = $request->nombre;
        $planDesarrolloNivel2->objetivo = $request->objetivo;
     
        $planDesarrolloNivel2->save();
     
        return redirect('plandesarrollonivel1/listar/'.$request->nivel1_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::find($id);
        PlanDesarrolloNivel2::destroy($id);        
 
        return redirect('plandesarrollonivel1/listar/'.$planDesarrolloNivel2->nivel1_id);
    }

    /**
     * Listas todos los registros del nivel 3 qui tienen como padre NIVEL 2.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar($idA,$idB)
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::find($idA);
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::find($idB);
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::where('nivel2_id', $idB)->get();
        return view('plandesarrollonivel2.listar', compact('planDesarrollo','planDesarrolloNivel1','planDesarrolloNivel2','planDesarrolloNivel3'));
    }
}
