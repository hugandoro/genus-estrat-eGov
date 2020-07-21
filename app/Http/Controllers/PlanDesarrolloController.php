<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlanDesarrollo;
use App\PlanDesarrolloNivel1;
use App\PlanDesarrolloNivel2;
use App\PlanDesarrolloNivel3;
use App\PlanDesarrolloNivel4;
use Illuminate\Support\Facades\DB;

class PlanDesarrolloController extends Controller
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
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::where('plan_desarrollo_id', config('app.plan_desarrollo'))->get();
        return view('plandesarrollo.index', compact('planDesarrollo','planDesarrolloNivel1'));
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
        $planDesarrollo = PlanDesarrollo::find($id);
        return view('plandesarrollo.edit',['planDesarrollo'=>$planDesarrollo]);
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
        $planDesarrollo = PlanDesarrollo::find($id);
 
        $planDesarrollo->nombre_nivel1 = $request->nombre_nivel1;
        $planDesarrollo->nombre_nivel2 = $request->nombre_nivel2;
        $planDesarrollo->nombre_nivel3 = $request->nombre_nivel3;
        $planDesarrollo->nombre_nivel4 = $request->nombre_nivel4;
     
        $planDesarrollo->save();
     
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
        //
    }

    /**
     * Vision estilo INFOGRAFIA del plan y sus aristas
     *
     * @return \Illuminate\Http\Response
     */
    public function infografia()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::where('plan_desarrollo_id', config('app.plan_desarrollo'))->get();

        //Labels o nombres personalizados de los 4 niveles de profundidad del plan, posicion [0] porque se asume que solo existe UN PLAN 
        $tituloNiveles = [ 
                            $planDesarrollo[0]->nombre_nivel1, 
                            $planDesarrollo[0]->nombre_nivel2, 
                            $planDesarrollo[0]->nombre_nivel3, 
                            $planDesarrollo[0]->nombre_nivel4 
                        ];

        //! Se debe organizar para hacerlo dinamico, actualmente limitado a 4 registros
        $nombresNivel1 = [ 
                            $planDesarrolloNivel1[0]->nombre, 
                            $planDesarrolloNivel1[1]->nombre, 
                            $planDesarrolloNivel1[2]->nombre, 
                            $planDesarrolloNivel1[3]->nombre 
                        ];

        return view('plandesarrollo.infografia',array(
                                                    'tituloNivel1'  =>  $tituloNiveles[0],
                                                    'tituloNivel2'  =>  $tituloNiveles[1],
                                                    'tituloNivel3'  =>  $tituloNiveles[2],
                                                    'tituloNivel4'  =>  $tituloNiveles[3],
    
                                                    'nombreANivel1' =>  $nombresNivel1[0],
                                                    'nombreBNivel1' =>  $nombresNivel1[1],
                                                    'nombreCNivel1' =>  $nombresNivel1[2],
                                                    'nombreDNivel1' =>  $nombresNivel1[3]
                                                ));
    }
}
