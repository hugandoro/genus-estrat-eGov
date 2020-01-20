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
        //
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
        //
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
     * Listas todos los registros del nivel 4 qui tienen como padre NIVEL 3.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar($id)
    {
        $planDesarrollo = PlanDesarrollo::with('administracion')->get();
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::all();
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::all();
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::all();
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::all();
        return view('plandesarrollonivel3.listar', compact('planDesarrollo','planDesarrolloNivel1','planDesarrolloNivel2','planDesarrolloNivel3','planDesarrolloNivel4'));
    }
}
