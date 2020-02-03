<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RefDepartamentalPolitica;

class RefDepartamentalPoliticaController extends Controller
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
    	$refDepartamentalPolitica = RefDepartamentalPolitica::where('departamento_id', config('app.departamento'))->get();
        return view('refdepartamentalpolitica.index', compact('refDepartamentalPolitica'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$refDepartamentalPolitica = RefDepartamentalPolitica::where('departamento_id', config('app.departamento'))->get();
        return view('refdepartamentalpolitica.create', compact('refDepartamentalPolitica'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $refDepartamentalPolitica = new RefDepartamentalPolitica;
 
        $refDepartamentalPolitica->nombre = $request->nombre;
        $refDepartamentalPolitica->descripcion = $request->descripcion;
        $refDepartamentalPolitica->departamento_id = $request->departamento_id; 
 
        $refDepartamentalPolitica->save();
 
        return redirect('ppdepartamental')->with('message','Guardado Satisfactoriamente !');
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
        $refDepartamentalPolitica = RefDepartamentalPolitica::find($id);
        return view('refdepartamentalpolitica.edit',['refDepartamentalPolitica'=>$refDepartamentalPolitica]);
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
        $refDepartamentalPolitica = RefDepartamentalPolitica::find($id);
 
        $refDepartamentalPolitica->nombre = $request->nombre;
        $refDepartamentalPolitica->descripcion = $request->descripcion;
     
        $refDepartamentalPolitica->save();
     
        return redirect('ppdepartamental')->with('message','Editado Satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RefDepartamentalPolitica::destroy($id);        
 
        return redirect('ppdepartamental')->with('message','Eliminado Satisfactoriamente !');
    }
}
