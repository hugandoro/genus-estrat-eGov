<?php

namespace App\Http\Controllers;

use App\EntidadOficina;
use Illuminate\Http\Request;
use App\PlanDesarrollo;
use App\PlanDesarrolloNivel1;
use App\PlanDesarrolloNivel2;
use App\PlanDesarrolloNivel3;
use App\PlanDesarrolloNivel4;
use App\OdsNivel4;
use App\RefOdsObjetivo;
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
     * Vision estilo INFOGRAFIA del PLAN y sus COMPONENTES
     *
     * @return \Illuminate\Http\Response
     */
    public function graficaPlanComponentes()
    {
        //Nombres de los NIVELES DEL PLAN
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $tituloNiveles = [ 
            $planDesarrollo[0]->nombre_nivel1, 
            $planDesarrollo[0]->nombre_nivel2, 
            $planDesarrollo[0]->nombre_nivel3, 
            $planDesarrollo[0]->nombre_nivel4 
        ];

        //Inicializa TODOS los VECTORES temporales
        $n4AgrupadoN1 = [0,0,0,0]; //Registros Nivel4 agrupados por Nivel1
        $n3AgrupadoN1 = [0,0,0,0]; //Registros Nivel3 agrupados por Nivel1
        $n2AgrupadoN1 = [0,0,0,0]; //Registros Nivel2 agrupados por Nivel1

        //NIVEL 1
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::where('plan_desarrollo_id', config('app.plan_desarrollo'))->get();
        $indiceNivel1 = 0;
        foreach($planDesarrolloNivel1 as $registroNivel1){
            $nombresNivel1 [$indiceNivel1] = $registroNivel1->nombre;

            //NIVEL 2
            $planDesarrolloNivel2 = PlanDesarrolloNivel2::where('nivel1_id', $registroNivel1->id)->get();
            $indiceNivel2 = 0;
            foreach($planDesarrolloNivel2 as $registroNivel2){
                $nombresNivel2 [$indiceNivel2] = $registroNivel2->nombre;

                //NIVEL 3
                $planDesarrolloNivel3 = PlanDesarrolloNivel3::where('nivel2_id', $registroNivel2->id)->get();
                $indiceNivel3 = 0;
                foreach($planDesarrolloNivel3 as $registroNivel3){
                    $nombresNivel3 [$indiceNivel3] = $registroNivel2->nombre;

                    //NIVEL 4
                    $planDesarrolloNivel4 = PlanDesarrolloNivel4::where('nivel3_id', $registroNivel3->id)->get();
                    $indiceNivel4 = 0;
                    foreach($planDesarrolloNivel4 as $registroNivel4){
                        $nombresNivel4 [$indiceNivel4] = $registroNivel4->nombre;

                        $n4AgrupadoN1 [$indiceNivel1]++;
                        $indiceNivel4++;
                    }

                    $n3AgrupadoN1 [$indiceNivel1]++;
                    $indiceNivel3++;
                }

                $n2AgrupadoN1 [$indiceNivel1]++;
                $indiceNivel2++;
            }

            $indiceNivel1++;
        }              


        return view('plandesarrollo.graficaplancomponentes',array(
            'tituloNivel1'  =>  $tituloNiveles[0],
            'tituloNivel2'  =>  $tituloNiveles[1],
            'tituloNivel3'  =>  $tituloNiveles[2],
            'tituloNivel4'  =>  $tituloNiveles[3],
    
            'nombreANivel1' =>  $nombresNivel1[0],
            'nombreBNivel1' =>  $nombresNivel1[1],
            'nombreCNivel1' =>  $nombresNivel1[2],
            'nombreDNivel1' =>  $nombresNivel1[3],

            'nivel4ANivel1' => $n4AgrupadoN1[0],
            'nivel4BNivel1' => $n4AgrupadoN1[1],
            'nivel4CNivel1' => $n4AgrupadoN1[2],
            'nivel4DNivel1' => $n4AgrupadoN1[3],

            'nivel3ANivel1' => $n3AgrupadoN1[0],
            'nivel3BNivel1' => $n3AgrupadoN1[1],
            'nivel3CNivel1' => $n3AgrupadoN1[2],
            'nivel3DNivel1' => $n3AgrupadoN1[3],

            'nivel2ANivel1' => $n2AgrupadoN1[0],
            'nivel2BNivel1' => $n2AgrupadoN1[1],
            'nivel2CNivel1' => $n2AgrupadoN1[2],
            'nivel2DNivel1' => $n2AgrupadoN1[3],

        ));
    }

    /**
     * Vision estilo INFOGRAFIA del PLAN y sus RESPONSABLES
     *
     * @return \Illuminate\Http\Response
     */
    public function graficaPlanResponsables()
    {
        //Nombres de los NIVELES DEL PLAN
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $tituloNiveles = [ 
            $planDesarrollo[0]->nombre_nivel1, 
            $planDesarrollo[0]->nombre_nivel2, 
            $planDesarrollo[0]->nombre_nivel3, 
            $planDesarrollo[0]->nombre_nivel4 
        ];

        //Nombres de las SECRETARIAS o DEPENDENCIAS
        $entidadOficina = EntidadOficina::where('entidad_id', config('app.entidad'))->get();
        foreach($entidadOficina as $registro){
            $nombresSecretarias [$registro->id] = $registro->nombre;
            $n4AgrupadoSecretaria [$registro->id] = 0; //Inicializa el vector temporal para Agrupar
        }

        //NIVEL 1
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::where('plan_desarrollo_id', config('app.plan_desarrollo'))->get();
        $indiceNivel1 = 0;
        foreach($planDesarrolloNivel1 as $registroNivel1){

            //NIVEL 2
            $planDesarrolloNivel2 = PlanDesarrolloNivel2::where('nivel1_id', $registroNivel1->id)->get();
            $indiceNivel2 = 0;
            foreach($planDesarrolloNivel2 as $registroNivel2){

                //NIVEL 3
                $planDesarrolloNivel3 = PlanDesarrolloNivel3::where('nivel2_id', $registroNivel2->id)->get();
                $indiceNivel3 = 0;
                foreach($planDesarrolloNivel3 as $registroNivel3){

                    //NIVEL 4
                    $planDesarrolloNivel4 = PlanDesarrolloNivel4::where('nivel3_id', $registroNivel3->id)->get();
                    $indiceNivel4 = 0;
                    foreach($planDesarrolloNivel4 as $registroNivel4){

                        $n4AgrupadoSecretaria [$registroNivel4->oficina_id]++;
                        $indiceNivel4++;
                    }

                    $indiceNivel3++;
                }

                $indiceNivel2++;
            }

            $indiceNivel1++;
        }              


        return view('plandesarrollo.graficaplanresponsables',array(
            'tituloNivel1'  =>  $tituloNiveles[0],
            'tituloNivel2'  =>  $tituloNiveles[1],
            'tituloNivel3'  =>  $tituloNiveles[2],
            'tituloNivel4'  =>  $tituloNiveles[3],
    
            'nombresSecretarias' => $nombresSecretarias,
            'nivel4Secretaria' => $n4AgrupadoSecretaria
        ));
    }

   /**
     * Vision estilo INFOGRAFIA de los ODS y su CONVERGENCIA
     *
     * @return \Illuminate\Http\Response
     */
    public function graficaPlanODS()
    {
        //Tabla PIVOT convergencia ODS_NIVEL4S
        $odsNivel4 = OdsNivel4::orderBy('ods_id')->get();

        //Obtiene todos los ODS e inicializa el vector temporar de agrupamiento
        $refOdsObjetivo = RefOdsObjetivo::orderBy('id')->get();
        foreach($refOdsObjetivo as $ods){
            $n4AgrupadoODS [$ods->id] = 0; //Inicializa el vector temporal para Agrupar
        }

        //Agrupa los registros nivel 4 por ODS tomando para ello la tabla PIVOT
        foreach($odsNivel4 as $odsN4){
            $n4AgrupadoODS [$odsN4->ods_id]++;
        }           

        return view('plandesarrollo.graficaplanods',array(
            'nivel4ODS' => $n4AgrupadoODS
        ));
    }

}
