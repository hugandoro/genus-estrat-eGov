<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RefNacionalPolitica;

class RefNacionalPoliticaController extends Controller
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
    	$refNacionalPolitica = RefNacionalPolitica::where('estado_id', config('app.estado'))->get();
        return view('refnacionalpolitica.index', compact('refNacionalPolitica'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$refNacionalPolitica = RefNacionalPolitica::where('estado_id', config('app.estado'))->get();
        return view('refnacionalpolitica.create', compact('refNacionalPolitica'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $refNacionalPolitica = new RefNacionalPolitica;
 
        $refNacionalPolitica->nombre = $request->nombre;
        $refNacionalPolitica->descripcion = $request->descripcion;
        $refNacionalPolitica->estado_id = $request->estado_id; 
 
        $refNacionalPolitica->save();
 
        return redirect('ppnacional')->with('message','Guardado Satisfactoriamente !');
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
        $refNacionalPolitica = RefNacionalPolitica::find($id);
        return view('refnacionalpolitica.edit',['refNacionalPolitica'=>$refNacionalPolitica]);
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
        $refNacionalPolitica = RefNacionalPolitica::find($id);
 
        $refNacionalPolitica->nombre = $request->nombre;
        $refNacionalPolitica->descripcion = $request->descripcion;
     
        $refNacionalPolitica->save();
     
        return redirect('ppnacional')->with('message','Editado Satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RefNacionalPolitica::destroy($id);        
 
        return redirect('ppnacional')->with('message','Eliminado Satisfactoriamente !');
    }
}
