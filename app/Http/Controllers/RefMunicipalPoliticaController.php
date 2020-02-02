<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RefMunicipalPolitica;

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
}
