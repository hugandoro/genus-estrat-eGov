<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EntidadOficina;
use App\EntidadTipoOficina;
use Illuminate\Support\Facades\DB;

class EntidadOficinaController extends Controller
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
        $entidadOficina = EntidadOficina::where('entidad_id', config('app.entidad'))->with('entidad', 'tipoOficina')->get();
        return view('entidadoficina.index', compact('entidadOficina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entidadOficina = EntidadOficina::where('entidad_id', config('app.entidad'))->get();
        $entidadTipoOficina = EntidadTipoOficina::all();
        return view('entidadOficina.create', compact('entidadTipoOficina','entidadOficina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entidadOficina = new EntidadOficina;
 
        $entidadOficina->entidad_id = $request->entidad_id;
        $entidadOficina->tipo_oficina_id = $request->tipo_oficina_id; 
        $entidadOficina->nombre = $request->nombre;
        $entidadOficina->responsable = $request->responsable;

        $entidadOficina->save();
 
        return redirect('entidadoficina')->with('message','Guardado Satisfactoriamente !');
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
        $entidadOficina = EntidadOficina::find($id);
        $entidadTipoOficina = EntidadTipoOficina::all();
        return view('entidadoficina.edit',compact('entidadTipoOficina'),['entidadOficina'=>$entidadOficina]);
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
        $entidadOficina = EntidadOficina::find($id);
 
        $entidadOficina->tipo_oficina_id = $request->tipo_oficina_id; 
        $entidadOficina->nombre = $request->nombre;
        $entidadOficina->responsable = $request->responsable;
     
        $entidadOficina->save();
     
        return redirect('entidadoficina')->with('message','Editado Satisfactoriamente !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EntidadOficina::destroy($id);        
 
        return redirect('entidadoficina')->with('message','Eliminado Satisfactoriamente !');
    }
}
