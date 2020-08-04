<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RefOdsObjetivo;
use App\PlanDesarrollo;
use App\PlanDesarrolloNivel1;
use App\PlanDesarrolloNivel2;
use App\PlanDesarrolloNivel3;
use App\PlanDesarrolloNivel4;
use App\EntidadOficina;
use App\MedicionIndicador;
use App\OdsNivel4;
use App\RefNacionalPlan;
use App\NacionalplanNivel4;
use App\RefMunicipalPolitica;
use App\MunicipalpoliticaNivel4;
use App\RefMipgPolitica;
use App\MipgNivel4;


class RefOdsObjetivoController extends Controller
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
    	$refOdsObjetivo = RefOdsObjetivo::all();
        return view('refodsobjetivo.index', compact('refOdsObjetivo'));
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
        $refOdsObjetivo = RefOdsObjetivo::find($id);
        $refOdsObjetivo->descripcion = nl2br($refOdsObjetivo->descripcion);
        return view('refodsobjetivo.show', compact('refOdsObjetivo'));
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
     * Listar GLOBALMENTE todos los registros de nivel 4 con ODS vinculados
     * @return \Illuminate\Http\Response
     */
    public function listarConvergencia()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();

        //Consulta y obtiene TODOS los registros nivel 4
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')->get();
        

        //Valida si trae un filtro de busqueda por ODS y obtiene el respectivo ODS
        if (isset($_GET['filtroODS'])) 
            $odsSeleccionado = RefOdsObjetivo::find($_GET['filtroODS']);
        else
            $odsSeleccionado = RefOdsObjetivo::find(1); // Sin filtro por defecto lista ODS N° 1


        //Nueva coleccion para almacenar SOLO los registros Nivel 4 que convergen con el ODS seleccionado
        $convergenciaNivel4ODS = collect();

        foreach($planDesarrolloNivel4 as $PDN4){
            //Bandera a 0, si encuentra convergencia en la tabla Pivote de la relacion "Nivel4" cambia bandera a 1 o mas
            $banderaConverge = 0;
            foreach($odsSeleccionado->nivel4 as $odsPDN4){
                if ($PDN4->id == $odsPDN4->id) $banderaConverge++;
            }

            //Si bandera difiere de 0 señal de convergencia, agrega el registro Nivel4 a la coleccion de SOLO convergencias
            if ($banderaConverge != 0) $convergenciaNivel4ODS->push($PDN4); //
        }

        $refOdsObjetivo = RefOdsObjetivo::orderBy('id')->get();
        return view('refodsobjetivo.listarconvergencia', compact('planDesarrollo','refOdsObjetivo', 'convergenciaNivel4ODS'));
    }

}
