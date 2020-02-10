<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlanDesarrollo;
use App\PlanDesarrolloNivel1;
use App\PlanDesarrolloNivel2;
use App\PlanDesarrolloNivel3;
use App\PlanDesarrolloNivel4;
use Illuminate\Support\Facades\DB;

class PlanDesarrolloNivel1Controller extends Controller
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
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
    	$planDesarrolloNivel1 = PlanDesarrolloNivel1::where('plan_desarrollo_id', config('app.plan_desarrollo'))->get();
        return view('plandesarrollonivel1.create', compact('planDesarrollo','planDesarrolloNivel1'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planDesarrolloNivel1 = new PlanDesarrolloNivel1;
 
        $planDesarrolloNivel1->numeral = $request->numeral;
        $planDesarrolloNivel1->nombre = $request->nombre;
        $planDesarrolloNivel1->descripcion = $request->descripcion;
        $planDesarrolloNivel1->plan_desarrollo_id = $request->plan_desarrollo_id; 
 
        $planDesarrolloNivel1->save();
 
        return redirect('plandesarrollo')->with('message','Guardado Satisfactoriamente !');
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
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::find($id);
        return view('plandesarrollonivel1.edit',compact('planDesarrollo'),['planDesarrolloNivel1'=>$planDesarrolloNivel1]);
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
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::find($id);
 
        $planDesarrolloNivel1->numeral = $request->numeral;
        $planDesarrolloNivel1->nombre = $request->nombre;
        $planDesarrolloNivel1->descripcion = $request->descripcion;
     
        $planDesarrolloNivel1->save();
     
        return redirect('plandesarrollo')->with('message','Editado Satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PlanDesarrolloNivel1::destroy($id);        
 
        return redirect('plandesarrollo')->with('message','Eliminado Satisfactoriamente !');
    }

    /**
     * Listas todos los registros del nivel 2 qui tienen como padre NIVEL 1.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar($idA)
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::find($idA);
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::where('nivel1_id', $idA)->get();
        return view('plandesarrollonivel1.listar', compact('planDesarrollo','planDesarrolloNivel1','planDesarrolloNivel2'));
    }
}
