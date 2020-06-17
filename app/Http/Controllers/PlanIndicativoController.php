<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlanDesarrollo;
use App\PlanDesarrolloNivel1;
use App\PlanDesarrolloNivel2;
use App\PlanDesarrolloNivel3;
use App\PlanDesarrolloNivel4;
use App\EntidadOficina;
use App\MedicionIndicador;
use App\PlanIndicativo;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MedicionIndicadorController;

class PlanIndicativoController extends Controller
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
    public function create(Request $request)
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
     * Listar GLOBALMENTE todos los registros del nivel 4 ( Actividades o Metas ) 
     * @return \Illuminate\Http\Response
     */
    public function listarRegistros()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();

        //Valida si trae un filtro de busqueda por Secretaria | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                        ->where('oficina_id', $_GET['filtroSecretaria'])
                                        ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                        ->paginate(10);
        else
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')->paginate(10);

        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $planDesarrolloNivel4->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODOS los indicadores
        $medicionIndicador = MedicionIndicador::orderBy('nivel4_id')
                        ->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')
                        ->get(); 

        //Carga TODO el plan indicativo
        $planIndicativo = PlanIndicativo::orderBy('vigencia_id')
                            ->with('indicador','vigencia','indicador.unidadMedida','indicador.Medida', 'indicador.Tipo', 'indicador.Nivel4', 'indicador.Nivel4.nivel3', 'indicador.Nivel4.nivel3.nivel2','indicador.Nivel4.nivel3.nivel2.nivel1','indicador.Nivel4.nivel3.nivel2.nivel1.plandesarrollo','indicador.Nivel4.entidadOficina')
                            ->get();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();
        return view('planindicativo.listarplanindicativo', compact('planDesarrollo','planDesarrolloNivel4','medicionIndicador','planIndicativo','entidadOficina','pagination'));
    }

}
