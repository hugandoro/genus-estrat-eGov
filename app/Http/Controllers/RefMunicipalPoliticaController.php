<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RefMunicipalPolitica;
use App\RefOdsObjetivo;
use App\PlanDesarrollo;
use App\PlanDesarrolloNivel4;

class RefMunicipalPoliticaController extends Controller
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
    	$refMunicipalPolitica = RefMunicipalPolitica::where('municipio_id', config('app.municipio'))->get();
        return view('refmunicipalpolitica.index', compact('refMunicipalPolitica'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$refMunicipalPolitica = RefMunicipalPolitica::where('municipio_id', config('app.municipio'))->get();
        return view('refmunicipalpolitica.create', compact('refMunicipalPolitica'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $refMunicipalPolitica = new RefMunicipalPolitica;
 
        $refMunicipalPolitica->nombre = $request->nombre;
        $refMunicipalPolitica->descripcion = $request->descripcion;
        $refMunicipalPolitica->municipio_id = $request->municipio_id; 
 
        $refMunicipalPolitica->save();
 
        return redirect('ppmunicipal')->with('message','Guardado Satisfactoriamente !');
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
        $refMunicipalPolitica = RefMunicipalPolitica::find($id);
        return view('refmunicipalpolitica.edit',['refMunicipalPolitica'=>$refMunicipalPolitica]);
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
        $refMunicipalPolitica = RefMunicipalPolitica::find($id);
 
        $refMunicipalPolitica->nombre = $request->nombre;
        $refMunicipalPolitica->descripcion = $request->descripcion;
     
        $refMunicipalPolitica->save();
     
        return redirect('ppmunicipal')->with('message','Editado Satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RefMunicipalPolitica::destroy($id);        
 
        return redirect('ppmunicipal')->with('message','Eliminado Satisfactoriamente !');
    }

    /**
     * Listar GLOBALMENTE todos los registros de nivel 4 con PP MUNICIPAL vinculados
     * @return \Illuminate\Http\Response
     */
    public function listarConvergencia()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();

        //Consulta y obtiene TODOS los registros nivel 4
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')->get();
        

        //Valida si trae un filtro de busqueda por PP MUNICIPAL y obtiene la respectiva PP MUNICIPAL
        if (isset($_GET['filtroPPMunicipal'])) 
            $ppMunicipaSeleccionado = RefMunicipalPolitica::find($_GET['filtroPPMunicipal']);
        else
            $ppMunicipaSeleccionado = RefMunicipalPolitica::find(1); // Sin filtro por defecto lista PP MUNICIPAL N° 1


        //Nueva coleccion para almacenar SOLO los registros Nivel 4 que convergen con la PP MUNICIPAL seleccionada
        $convergenciaNivel4PPMunicipal = collect();

        foreach($planDesarrolloNivel4 as $PDN4){
            //Bandera a 0, si encuentra convergencia en la tabla Pivote de la relacion "Nivel4" cambia bandera a 1 o mas
            $banderaConverge = 0;
            foreach($ppMunicipaSeleccionado->nivel4 as $ppmPDN4){
                if ($PDN4->id == $ppmPDN4->id) $banderaConverge++;
            }

            //Si bandera difiere de 0 señal de convergencia, agrega el registro Nivel4 a la coleccion de SOLO convergencias
            if ($banderaConverge != 0) $convergenciaNivel4PPMunicipal->push($PDN4); //
        }

        $refMunicipalPolitica = RefMunicipalPolitica::orderBy('id')->get();
        return view('refmunicipalpolitica.listarconvergencia', compact('planDesarrollo','refMunicipalPolitica', 'convergenciaNivel4PPMunicipal'));
    }

}
