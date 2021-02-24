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
use App\PlanAccion;
use App\Tarea;

use App\RefOdsObjetivo;
use App\OdsNivel4;
use App\RefNacionalPlan;
use App\NacionalplanNivel4;
use App\RefMunicipalPolitica;
use App\MunicipalpoliticaNivel4;
use App\RefMipgPolitica;
use App\MipgNivel4;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MedicionIndicadorController;

class PlanDesarrolloNivel4Controller extends Controller
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
        $idNivel1 = $request->idNivel1;
        $idNivel2 = $request->idNivel2;
        $idNivel3 = $request->idNivel3;
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::where('nivel3_id', $idNivel3)->get();

        $entidadOficina = EntidadOficina::where('entidad_id',config('app.entidad'))->get();
  
        return view('plandesarrollonivel4.create',compact('entidadOficina','planDesarrollo'),['idNivel1' => $idNivel1, 'idNivel2' => $idNivel2, 'idNivel3' => $idNivel3],compact('planDesarrolloNivel4'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planDesarrolloNivel4 = new PlanDesarrolloNivel4;
 
        $planDesarrolloNivel4->numeral = $request->numeral;
        $planDesarrolloNivel4->nombre = $request->nombre;
        $planDesarrolloNivel4->objetivo = $request->objetivo;
        $planDesarrolloNivel4->nivel3_id = $request->nivel3_id; 
        $planDesarrolloNivel4->oficina_id = $request->oficina_id; 
 
        $planDesarrolloNivel4->save();

        //Obtener el ID del nuevo registro agregado
        $nivel4_id = $planDesarrolloNivel4->id;

        //* Llama un metodo de otro controlador directamente - En este caso de 'MedicionIndicadorController' para agregar el indicador por defecto  
        app('App\Http\Controllers\MedicionIndicadorController')->crearIndicadorInicial($nivel4_id);

        return redirect('plandesarrollonivel3/listar/'.$request->nivel1_id.'/'.$request->nivel2_id.'/'.$request->nivel3_id);
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
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::find($id);

        //Realiza busqueda inversa para armar el arbol de niveles para las rutas
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::where('id', $planDesarrolloNivel4->nivel3_id)->get();
        //Toma el primer registro para no enviar un array de resultados SOLO un resultado para tomar el Id del nivel 2
        $planDesarrolloNivel3 = $planDesarrolloNivel3[0];
        //Realiza busqueda inversa para armar el arbol de niveles para las rutas
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::where('id', $planDesarrolloNivel3->nivel2_id)->get();
        //Toma el primer registro para no enviar un array de resultados SOLO un resultado para tomar el Id del nivel 1
        $planDesarrolloNivel2 = $planDesarrolloNivel2[0];

        $entidadOficina = EntidadOficina::where('entidad_id',config('app.entidad'))->get();

        return view('plandesarrollonivel4.edit',compact('entidadOficina','planDesarrollo'),['planDesarrolloNivel2'=>$planDesarrolloNivel2, 'planDesarrolloNivel3'=>$planDesarrolloNivel3, 'planDesarrolloNivel4'=>$planDesarrolloNivel4]);
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
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::find($id);
 
        $planDesarrolloNivel4->numeral = $request->numeral;
        $planDesarrolloNivel4->nombre = $request->nombre;
        $planDesarrolloNivel4->objetivo = $request->objetivo;
        $planDesarrolloNivel4->oficina_id = $request->oficina_id; 
     
        $planDesarrolloNivel4->save();
     
        return redirect('plandesarrollonivel3/listar/'.$request->nivel1_id.'/'.$request->nivel2_id.'/'.$request->nivel3_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::find($id);
        
        //Realiza busqueda inversa para armar el arbol de niveles para las rutas
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::where('id', $planDesarrolloNivel4->nivel3_id)->get();
        //Toma el primer registro para no enviar un array de resultados SOLO un resultado para tomar el Id del nivel 2
        $planDesarrolloNivel3 = $planDesarrolloNivel3[0];
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::where('id', $planDesarrolloNivel3->nivel2_id)->get();
        $planDesarrolloNivel2 = $planDesarrolloNivel2[0];
        
        //* Eliminar el controlador vinculado ANTES de eliminar el registro  
        app('App\Http\Controllers\MedicionIndicadorController')->destroy($id);

        PlanDesarrolloNivel4::destroy($id);   
   
 
        return redirect('plandesarrollonivel3/listar/'.$planDesarrolloNivel2->nivel1_id.'/'.$planDesarrolloNivel3->nivel2_id.'/'.$planDesarrolloNivel4->nivel3_id);
    }

    /**
     * Listar GLOBALMENTE todos los registros del nivel 4 ( Actividades o Metas ) 
     * @return \Illuminate\Http\Response
     */
    public function listarRegistros()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();

        //Hace una primer busqueda GENERAL
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')->paginate(10);
        
        //Valida si trae un filtro de busqueda por Secretaria | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('oficina_id', $_GET['filtroSecretaria'])
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(10);

        if ((isset($_GET['filtroactividad'])) && ($_GET['filtroactividad'] != '')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('numeral', $_GET['filtroactividad'])
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(10);

        if ((isset($_GET['filtropalabras'])) && ($_GET['filtropalabras'] != '')){ 
            $filtropalabra = $_GET['filtropalabras'];
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('nombre', 'LIKE', "%$filtropalabra%")
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(10);
        }

        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $planDesarrolloNivel4->appends(request () -> except (['page', '_token'])) -> links ();

        $entidadOficina = EntidadOficina::orderBy('nombre')->get();
        return view('plandesarrollonivel4.listarregistros', compact('planDesarrollo','planDesarrolloNivel4','entidadOficina', 'pagination'));
    }

    /**
     * Lista la HOJA DE VIDA completa de la meta desde la opcion LISTAR REGISTROS
     *
     * @return \Illuminate\Http\Response
     */
    public function listarRegistrosHojaDeVida($idA,$idB,$idC,$idD)
    {
        //Envia toda la estructura del PLAN relacionada con el registro nivel 4 ( Meta, actividad, etc )
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::find($idA);
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::find($idB);
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::find($idC);
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::find($idD);

        //Envia los datos de los indicadores relacionados
        $indicador = MedicionIndicador::where('nivel4_id', $idD)->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')->get();

        //LISTAR TODOS LOS DATOS - CONVERGENCIA PARA MOSTRAR
        //Listar todos los ODS - Convergencia ODS
        $odsNivel4 = OdsNivel4::where('nivel4_id', $idD)->with('odsInformacion')->get();
        //Listar todos los PLAN NACIONAL - Convergencia PLAN NACIONAL
        $nacionalplanNivel4 = NacionalplanNivel4::where('nivel4_id', $idD)->with('nacionalplanInformacion')->get();
        //Listar todas las POLITICAS PUBLICAS MUNICIPALES - Convergencia POLITICA MUNICIPAL
        $municipalpoliticaNivel4 = MunicipalpoliticaNivel4::where('nivel4_id', $idD)->with('municipalpoliticaInformacion')->get();
        //Listar todas las POLITICAS MIPG - Convergencia MIPG
        $mipgNivel4 = MipgNivel4::where('nivel4_id', $idD)->with('mipgInformacion')->get();

        return view('plandesarrollonivel4.listarregistroshojadevida', compact('planDesarrollo','planDesarrolloNivel1','planDesarrolloNivel2','planDesarrolloNivel3','planDesarrolloNivel4','indicador','odsNivel4','nacionalplanNivel4','municipalpoliticaNivel4','mipgNivel4'));
    }   

    /**
     * Lista la HOJA DE VIDA completa de la meta desde la opcion ARBOL DEL PLAN
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrarHojaDeVida($idA,$idB,$idC,$idD)
    {
        //Envia toda la estructura del PLAN relacionada con el registro nivel 4 ( Meta, actividad, etc )
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::find($idA);
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::find($idB);
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::find($idC);
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::find($idD);

        //Envia los datos de los indicadores relacionados
        $indicador = MedicionIndicador::where('nivel4_id', $idD)->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')->get();


        //LISTAR TODOS LOS DATOS - CONVERGENCIA PARA MOSTRAR
        //Listar todos los ODS - Convergencia ODS
        $refOdsObjetivo = RefOdsObjetivo::all();
        $odsNivel4 = OdsNivel4::where('nivel4_id', $idD)->with('odsInformacion')->get();
        //Listar todos los PLAN NACIONAL - Convergencia PLAN NACIONAL
        $refNacionalPlan = RefNacionalPlan::all();
        $nacionalplanNivel4 = NacionalplanNivel4::where('nivel4_id', $idD)->with('nacionalplanInformacion')->get();
        //Listar todas las POLITICAS PUBLICAS MUNICIPALES - Convergencia POLITICA MUNICIPAL
        $refMunicipalPolitica = RefMunicipalPolitica::all();
        $municipalpoliticaNivel4 = MunicipalpoliticaNivel4::where('nivel4_id', $idD)->with('municipalpoliticaInformacion')->get();
        //Listar todas las POLITICAS MIPG - Convergencia MIPG
        $refMipgPolitica = RefMipgPolitica::all();
        $mipgNivel4 = MipgNivel4::where('nivel4_id', $idD)->with('mipgInformacion')->get();


        return view('plandesarrollonivel4.hojadevida', compact('planDesarrollo','planDesarrolloNivel1','planDesarrolloNivel2','planDesarrolloNivel3','planDesarrolloNivel4','indicador','refOdsObjetivo','odsNivel4','refNacionalPlan','nacionalplanNivel4','refMunicipalPolitica','municipalpoliticaNivel4','refMipgPolitica','mipgNivel4'));
    }

    /**
     * Vincula ODS al NIVEL 4
     *
     * @return \Illuminate\Http\Response
     */
    public function vincularODS(Request $request)
    {
        //Envia toda la estructura del PLAN relacionada con el registro nivel 4 ( Meta, actividad, etc )
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::find($request->nivel1_id);
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::find($request->nivel2_id);
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::find($request->nivel3_id);
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::find($request->nivel4_id);

        //Envia los datos de los indicadores relacionados
        $indicador = MedicionIndicador::where('nivel4_id', $request->nivel4_id)->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')->get();

        //ODS - Elimina TODOS los registros de relacion MUCHOS a MUCHOS
        $planDesarrolloNivel4->ods()->detach ($request->ods_id); 
        //Si la funcion es vincular, ingresa un registro en la relacion MUCHOS a MUCHOS
        if ($request->funcion == 'vincular') $planDesarrolloNivel4->ods()->attach ($request->ods_id);


        //LISTAR TODOS LOS DATOS - CONVERGENCIA PARA MOSTRAR
        // Listar todos los ODS - Convergencia ODS
        $refOdsObjetivo = RefOdsObjetivo::all();
        $odsNivel4 = OdsNivel4::where('nivel4_id', $request->nivel4_id)->with('odsInformacion')->get();
        //Listar todos los PLAN NACIONAL - Convergencia PLAN NACIONAL
        $refNacionalPlan = RefNacionalPlan::all();
        $nacionalplanNivel4 = NacionalplanNivel4::where('nivel4_id', $request->nivel4_id)->with('nacionalplanInformacion')->get();
        //Listar todas las POLITICAS PUBLICAS MUNICIPALES - Convergencia POLITICA MUNICIPAL
        $refMunicipalPolitica = RefMunicipalPolitica::all();
        $municipalpoliticaNivel4 = MunicipalpoliticaNivel4::where('nivel4_id', $request->nivel4_id)->with('municipalpoliticaInformacion')->get();
        //Listar todas las POLITICAS MIPG - Convergencia MIPG
        $refMipgPolitica = RefMipgPolitica::all();
        $mipgNivel4 = MipgNivel4::where('nivel4_id', $request->nivel4_id)->with('mipgInformacion')->get();


        //Vuelve y cargar la vista de HOJA DE VIDA una vez vinculado a la tabla pivote la relacion con el ODS
        return view('plandesarrollonivel4.hojadevida', compact('planDesarrollo','planDesarrolloNivel1','planDesarrolloNivel2','planDesarrolloNivel3','planDesarrolloNivel4','indicador','refOdsObjetivo','odsNivel4','refNacionalPlan','nacionalplanNivel4','refMunicipalPolitica','municipalpoliticaNivel4','refMipgPolitica','mipgNivel4'));
    }

    /**
     * Vincula PLAN NACIONAL DE DESARROLLO al NIVEL 4
     *
     * @return \Illuminate\Http\Response
     */
    public function vincularNacionalPlan(Request $request)
    {
        //Envia toda la estructura del PLAN relacionada con el registro nivel 4 ( Meta, actividad, etc )
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::find($request->nivel1_id);
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::find($request->nivel2_id);
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::find($request->nivel3_id);
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::find($request->nivel4_id);

        //Envia los datos de los indicadores relacionados
        $indicador = MedicionIndicador::where('nivel4_id', $request->nivel4_id)->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')->get();

        //PLAN NACIONAL - Elimina TODOS los registros de relacion MUCHOS a MUCHOS
        $planDesarrolloNivel4->nacionalplan()->detach ($request->nacionalplan_id); 
        //Si la funcion es vincular, ingresa un registro en la relacion MUCHOS a MUCHOS
        if ($request->funcion == 'vincular') $planDesarrolloNivel4->nacionalplan()->attach ($request->nacionalplan_id);


        //LISTAR TODOS LOS DATOS - CONVERGENCIA PARA MOSTRAR
        // Listar todos los ODS - Convergencia ODS
        $refOdsObjetivo = RefOdsObjetivo::all();
        $odsNivel4 = OdsNivel4::where('nivel4_id', $request->nivel4_id)->with('odsInformacion')->get();
        //Listar todos los PLAN NACIONAL - Convergencia PLAN NACIONAL
        $refNacionalPlan = RefNacionalPlan::all();
        $nacionalplanNivel4 = NacionalplanNivel4::where('nivel4_id', $request->nivel4_id)->with('nacionalplanInformacion')->get();
        //Listar todas las POLITICAS PUBLICAS MUNICIPALES - Convergencia POLITICA MUNICIPAL
        $refMunicipalPolitica = RefMunicipalPolitica::all();
        $municipalpoliticaNivel4 = MunicipalpoliticaNivel4::where('nivel4_id', $request->nivel4_id)->with('municipalpoliticaInformacion')->get();
        //Listar todas las POLITICAS MIPG - Convergencia MIPG
        $refMipgPolitica = RefMipgPolitica::all();
        $mipgNivel4 = MipgNivel4::where('nivel4_id', $request->nivel4_id)->with('mipgInformacion')->get();


        //Vuelve y cargar la vista de HOJA DE VIDA una vez vinculado a la tabla pivote la relacion con el ODS
        return view('plandesarrollonivel4.hojadevida', compact('planDesarrollo','planDesarrolloNivel1','planDesarrolloNivel2','planDesarrolloNivel3','planDesarrolloNivel4','indicador','refOdsObjetivo','odsNivel4','refNacionalPlan','nacionalplanNivel4','refMunicipalPolitica','municipalpoliticaNivel4','refMipgPolitica','mipgNivel4'));
    }

    /**
     * Vincula POLITICA MUNICIPAL al NIVEL 4
     *
     * @return \Illuminate\Http\Response
     */
    public function vincularMunicipalPolitica(Request $request)
    {
        //Envia toda la estructura del PLAN relacionada con el registro nivel 4 ( Meta, actividad, etc )
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::find($request->nivel1_id);
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::find($request->nivel2_id);
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::find($request->nivel3_id);
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::find($request->nivel4_id);

        //Envia los datos de los indicadores relacionados
        $indicador = MedicionIndicador::where('nivel4_id', $request->nivel4_id)->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')->get();

        //POLITICA MUNICIPAL - Elimina TODOS los registros de relacion MUCHOS a MUCHOS
        $planDesarrolloNivel4->municipalpolitica()->detach ($request->municipalpolitica_id); 
        //Si la funcion es vincular, ingresa un registro en la relacion MUCHOS a MUCHOS
        if ($request->funcion == 'vincular') $planDesarrolloNivel4->municipalpolitica()->attach ($request->municipalpolitica_id);


        //LISTAR TODOS LOS DATOS - CONVERGENCIA PARA MOSTRAR
        // Listar todos los ODS - Convergencia ODS
        $refOdsObjetivo = RefOdsObjetivo::all();
        $odsNivel4 = OdsNivel4::where('nivel4_id', $request->nivel4_id)->with('odsInformacion')->get();
        //Listar todos los PLAN NACIONAL - Convergencia PLAN NACIONAL
        $refNacionalPlan = RefNacionalPlan::all();
        $nacionalplanNivel4 = NacionalplanNivel4::where('nivel4_id', $request->nivel4_id)->with('nacionalplanInformacion')->get();
        //Listar todas las POLITICAS PUBLICAS MUNICIPALES - Convergencia POLITICA MUNICIPAL
        $refMunicipalPolitica = RefMunicipalPolitica::all();
        $municipalpoliticaNivel4 = MunicipalpoliticaNivel4::where('nivel4_id', $request->nivel4_id)->with('municipalpoliticaInformacion')->get();
        //Listar todas las POLITICAS MIPG - Convergencia MIPG
        $refMipgPolitica = RefMipgPolitica::all();
        $mipgNivel4 = MipgNivel4::where('nivel4_id', $request->nivel4_id)->with('mipgInformacion')->get();


        //Vuelve y cargar la vista de HOJA DE VIDA una vez vinculado a la tabla pivote la relacion con el ODS
        return view('plandesarrollonivel4.hojadevida', compact('planDesarrollo','planDesarrolloNivel1','planDesarrolloNivel2','planDesarrolloNivel3','planDesarrolloNivel4','indicador','refOdsObjetivo','odsNivel4','refNacionalPlan','nacionalplanNivel4','refMunicipalPolitica','municipalpoliticaNivel4','refMipgPolitica','mipgNivel4'));
    }

    /**
     * Vincula MIPG al NIVEL 4
     *
     * @return \Illuminate\Http\Response
     */
    public function vincularMIPG(Request $request)
    {
        //Envia toda la estructura del PLAN relacionada con el registro nivel 4 ( Meta, actividad, etc )
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();
        $planDesarrolloNivel1 = PlanDesarrolloNivel1::find($request->nivel1_id);
        $planDesarrolloNivel2 = PlanDesarrolloNivel2::find($request->nivel2_id);
        $planDesarrolloNivel3 = PlanDesarrolloNivel3::find($request->nivel3_id);
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::find($request->nivel4_id);

        //Envia los datos de los indicadores relacionados
        $indicador = MedicionIndicador::where('nivel4_id', $request->nivel4_id)->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')->get();

        //MIPG - Elimina TODOS los registros de relacion MUCHOS a MUCHOS
        $planDesarrolloNivel4->mipg()->detach ($request->mipg_id); 
        //Si la funcion es vincular, ingresa un registro en la relacion MUCHOS a MUCHOS
        if ($request->funcion == 'vincular') $planDesarrolloNivel4->mipg()->attach ($request->mipg_id);


        //LISTAR TODOS LOS DATOS - CONVERGENCIA PARA MOSTRAR
        // Listar todos los ODS - Convergencia ODS
        $refOdsObjetivo = RefOdsObjetivo::all();
        $odsNivel4 = OdsNivel4::where('nivel4_id', $request->nivel4_id)->with('odsInformacion')->get();
        //Listar todos los PLAN NACIONAL - Convergencia PLAN NACIONAL
        $refNacionalPlan = RefNacionalPlan::all();
        $nacionalplanNivel4 = NacionalplanNivel4::where('nivel4_id', $request->nivel4_id)->with('nacionalplanInformacion')->get();
        //Listar todas las POLITICAS PUBLICAS MUNICIPALES - Convergencia POLITICA MUNICIPAL
        $refMunicipalPolitica = RefMunicipalPolitica::all();
        $municipalpoliticaNivel4 = MunicipalpoliticaNivel4::where('nivel4_id', $request->nivel4_id)->with('municipalpoliticaInformacion')->get();
        //Listar todas las POLITICAS MIPG - Convergencia MIPG
        $refMipgPolitica = RefMipgPolitica::all();
        $mipgNivel4 = MipgNivel4::where('nivel4_id', $request->nivel4_id)->with('mipgInformacion')->get();


        //Vuelve y cargar la vista de HOJA DE VIDA una vez vinculado a la tabla pivote la relacion con el ODS
        return view('plandesarrollonivel4.hojadevida', compact('planDesarrollo','planDesarrolloNivel1','planDesarrolloNivel2','planDesarrolloNivel3','planDesarrolloNivel4','indicador','refOdsObjetivo','odsNivel4','refNacionalPlan','nacionalplanNivel4','refMunicipalPolitica','municipalpoliticaNivel4','refMipgPolitica','mipgNivel4'));
    }

    /**
     * Listar GLOBALMENTE el avance de las actividades NIVEL4
     * Ponderado cumplimiento ACTIVIDADES
     * Cumplimiento PLAN DE ACCION 2020
     * Ponderado cumplimiento PLAN DE DESARROLLO
     * @return \Illuminate\Http\Response
     */
    public function listarAvanceNivel4()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();

        //Hace una primer busqueda GENERAL
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')->paginate(1000);

        //Valida si trae un filtro de busqueda por Secretaria | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                        ->where('oficina_id', $_GET['filtroSecretaria'])
                                        ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                        ->paginate(1000);
                                        
        if ((isset($_GET['filtroactividad'])) && ($_GET['filtroactividad'] != '')) 
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('numeral', $_GET['filtroactividad'])
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(1000);

        if ((isset($_GET['filtropalabras'])) && ($_GET['filtropalabras'] != '')){ 
            $filtropalabra = $_GET['filtropalabras'];
            $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->where('nombre', 'LIKE', "%$filtropalabra%")
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->paginate(1000);
        }
        
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

        //Carga TODO el plan de accion (TODAS las acciones inscritas)
        $planAccion = PlanAccion::orderBy('plan_indicativo_id')
                            ->with('planIndicativo')
                            ->get();

        //Carga TODAS las Tareas
        $tarea = Tarea::orderBy('id')->get();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();
        
        return view('plandesarrollonivel4.listaravancenivel4', compact('planDesarrollo','planDesarrolloNivel4','medicionIndicador','planIndicativo','planAccion', 'tarea','entidadOficina','pagination'));
    }

    /**
     * Calcula y grafica AVANCE PLAN DE ACCION POR DEPENDENIAS y PLAN DESARROLLO POR DEPENDENCIAS
     * @return \Illuminate\Http\Response
     */
    public function graficaListarAvanceNivel4()
    {
        //Ampliacion a 5 minutos el limite de tiempo por ser una consulta extensa
        set_time_limit(300);

        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))
                            ->with('administracion')
                            ->get();

        //Hace una primer busqueda GENERAL
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->get();
    
        //Carga TODOS los indicadores
        $medicionIndicador = MedicionIndicador::orderBy('nivel4_id')
                                ->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')
                                ->get(); 

        //Carga TODO el plan indicativo
        $planIndicativo = PlanIndicativo::orderBy('vigencia_id')
                            ->with('indicador','vigencia','indicador.unidadMedida','indicador.Medida', 'indicador.Tipo', 'indicador.Nivel4', 'indicador.Nivel4.nivel3', 'indicador.Nivel4.nivel3.nivel2','indicador.Nivel4.nivel3.nivel2.nivel1','indicador.Nivel4.nivel3.nivel2.nivel1.plandesarrollo','indicador.Nivel4.entidadOficina')
                            ->get();

        //Carga TODO el plan de accion (TODAS las acciones inscritas)
        $planAccion = PlanAccion::orderBy('plan_indicativo_id')
                            ->with('planIndicativo')
                            ->get();

        //Carga TODAS las Tareas
        $tarea = Tarea::orderBy('id')
                    ->get();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')
                            ->get();


        //* INICIA fecha corte personalizada para calculo de acumuladores
        $fechaCorte = new \DateTime(); 
        if (isset($_GET['fecha_corte']))
            $fechaCorte = $_GET['fecha_corte'];
        //* FIN fecha corte personalizada para calculo de acumuladores


        //* Recorre todas las DEPENDENCIAS (OFICINA)
        foreach($entidadOficina as $entidad) {

            //Almacena en un arreglo el nombre de la dependencia
            $nombresSecretarias [$entidad->id] = $entidad->nombre;

            // Inicia contador numero de acciones inscritas - Agrupado por consulta general
            $acumAccionesGeneral = 0;
            // Inicia acumulador porcentaje de cumplimiento de los KPI - Agrupado por acciones consulta general
            $acumImpactoKPIGeneral = 0;
            // Inicia contador numero de actividades - Agrupado por consulta general
            $acumNivel4General = 0;
            // Inicia acumulador porcentaje de cumplimiento de los indicadores - Vigencia 2020
            $acumImpactoIndicador2020General = 0;

            //* Recorre todos los NIVEL4 (ACTIVIDADES) previamente filtradas
            foreach ($planDesarrolloNivel4->where('oficina_id', $entidad->id) as $Nivel4) {

                // TODO Almacena en un arreglo el numero de la meta, la descripcion, el nombre de la secretaria a cargo
                $metaNumero [$Nivel4->numeral] = $Nivel4->numeral;
                $metaNombre [$Nivel4->numeral] = $Nivel4->nombre;
                $metaSecretaria [$Nivel4->numeral] = $entidad->nombre;
                $metaCumplimientoPlanAccion [$Nivel4->numeral] = 0; //Inicializa vector porque no todas las metas tienen plan de accion, posterior almacena el valor en aquellas que si tengan plan de accion
                $metaCumplimientoPlanDesarrollo [$Nivel4->numeral] = 0; //Inicializa vector porque no todas las metas tienen plan de accion, posterior almacena el valor en aquellas que si tengan plan de accion

                //* Recorre todos los INDICADORES relacionados con cada NIVEL4 (ACTIVIDAD)
                foreach ($medicionIndicador->where('nivel4_id', $Nivel4->id) as $indicador) {

                    //* Recorre todos los PLANES INDICATIVOS relacionados con cada INDICADOR y para una VIGENCIA especifica
                    //! OJO se debe organizar para calcular PLAN DESARROLLO Cuatrienio, para la proxima vigencia no sirve, limita tareas solo de una vigencia y no del cuatrienio como se requiere para PLAN DESARROLLO
                    foreach ($planIndicativo->where('indicador_id', $indicador->id)->where('vigencia_id', '12') as $indicativo) {

                        // Inicializa Contador acumulado de ponderacion
                        $acumProporcionalPonderadoAccion = 0;

                        //* Recorreo todas las ACCIONES relacionadas con cada PLAN INDICATIVO 
                        foreach ($planAccion->where('plan_indicativo_id', $indicativo->id) as $accion) {

                            // Inicializa Contador acumulado de impacto KPI tareas reportadas
                            $acumImpactoKPI = 0;

                            // *** INICIO calculo ACUMULADORES
                            //* Recorreo todas las TAREAS relacionadas con cada ACCION
                            foreach ($tarea->where('accion_id', $accion->id)->where('updated_at','<',$fechaCorte) as $registro) {
                                $acumImpactoKPI = $acumImpactoKPI + $registro->impacto_kpi; // Acumula el impacto al KPI reportado en las tareas
                            }

                            // Verifica para evitar division Zero cuando no se tiene objetivo
                            if (($accion->objetivo != '') && ($accion->objetivo > '0')) {
                                //Lleva el valor del acumulado de Impacto al KPI a terminos de porcentaje acorde al objetivo
                                $porcentajeAcumImpactoKPI = round(((($acumImpactoKPI * 1) / $accion->objetivo) * 100), 2);

                                // Verifica no superar limite a 100 en caso de sobreejecucion 
                                if ($porcentajeAcumImpactoKPI <= 100) {
                                    $acumImpactoKPIGeneral = $acumImpactoKPIGeneral + $porcentajeAcumImpactoKPI;

                                    // Variable auxiliar "% de Cumplimiento accion" para posterior calculo del proporcional al ponderado
                                    $auxCumplimientoAccion = ($acumImpactoKPI * 1) / $accion->objetivo;
                                } else {
                                    // Limita a 100 en caso de sobreejecucion
                                    $acumImpactoKPIGeneral = $acumImpactoKPIGeneral + 100;

                                    // Variable auxiliar "% de Cumplimiento accion" para posterior caclulo del proporcional al  ponderado
                                    $auxCumplimientoAccion = 1;
                                }
                            }
                            // *** FIN calculo ACUMULADORES

                            // *** INICIO calculo PONDERADOS
                            // Evita division Zero cuando no se tiene objetivo
                            if (($accion->objetivo != '') && ($accion->objetivo > '0')) {
                                $proporcionalPonderadoAccion = ($auxCumplimientoAccion * $accion->ponderacion) / 1;
                            } else {
                                $proporcionalPonderadoAccion = 0;
                            }

                            $acumProporcionalPonderadoAccion = $acumProporcionalPonderadoAccion + $proporcionalPonderadoAccion;

                            // *** FIN calculo PONDERADOS

                            // Numero de ACCIONES (PLAN DE ACCION) contabilizadas
                            $acumAccionesGeneral = $acumAccionesGeneral + 1;

                        }

                        // TODO Almacena en un arreglo el porcentaje cumplimiento PLAN DE ACCION 2020 de CADA META
                        $metaCumplimientoPlanAccion [$Nivel4->numeral] = round(($acumProporcionalPonderadoAccion * 100),2);

                        // Diferente de CERO - Calcula dividiendo por el objetivo
                        if ($indicador->objetivo != 0) {
                            // TODO Almacena en un arreglo el porcentaje cumplimiento PLAN DE DESARROLLO CUATRIENIO de CADA META
                            $metaCumplimientoPlanDesarrollo [$Nivel4->numeral] = round(((($indicativo->valor * $acumProporcionalPonderadoAccion)/1)*100)/$indicador->objetivo,2);

                            // Acumula a nivel GENERAL el nivel de avance de cada Actividad Nivel 4 (Vigencia 2020
                            $acumImpactoIndicador2020General = $acumImpactoIndicador2020General + (((($indicativo->valor * $acumProporcionalPonderadoAccion) / 1) * 100) / $indicador->objetivo);
                        }

                        // CERO y tipo MANTENIMIENTO - Calcula dividiendo por la linea base multiplicado por 4
                        if (($indicador->objetivo == 0) && ($indicador->tipo_id == 3)) {
                            // TODO Almacena en un arreglo el porcentaje cumplimiento PLAN DE DESARROLLO CUATRIENIO de CADA META
                            $metaCumplimientoPlanDesarrollo [$Nivel4->numeral] = round(((($indicativo->valor * $acumProporcionalPonderadoAccion)/1)*100)/($indicador->linea_base*4),2);

                            // Acumula a nivel GENERAL el nivel de avance de cada Actividad Nivel 4 (Vigencia 2020)
                            $acumImpactoIndicador2020General = $acumImpactoIndicador2020General + (((($indicativo->valor * $acumProporcionalPonderadoAccion) / 1) * 100) / ($indicador->linea_base * 4));
                        }

                        // CERO y tipo NO MANTENIMIENTO - Igual a cero
                        if (($indicador->objetivo == 0) && ($indicador->tipo_id != 3)) {
                            // TODO Almacena en un arreglo el porcentaje cumplimiento PLAN DE DESARROLLO CUATRIENIO de CADA META
                            $metaCumplimientoPlanDesarrollo [$Nivel4->numeral] = 0;

                            // Acumula a nivel GENERAL el nivel de avance de cada Actividad Nivel 4 (Vigencia 2020)
                            $acumImpactoIndicador2020General = $acumImpactoIndicador2020General + 0;
                        }

                    }
                }

                // Numero de NIVEL4 (ACTIVIDADES) contabilizadas
                $acumNivel4General = $acumNivel4General + 1;
            } 

 
            //* PLAN DE ACCION POR DEPENDENCIA/SECRETARIA
            // Almacena en un vector segun el ID de la dependencia - N° de ACCIONES cargadas PLAN DE ACCION vigencia 
            $vectorAcumAccionesGeneral[$entidad->id] = $acumAccionesGeneral;
            // Calcula y almacena en un vector segurn ID de la dependencia - PORCENTAJE cumplimiento PLAN DE ACCION vigencia
            if ($acumAccionesGeneral != 0) 
                $vectorPorcentajePlanAccion[$entidad->id] = round(($acumImpactoKPIGeneral/$acumAccionesGeneral),2);
            else
                $vectorPorcentajePlanAccion[$entidad->id] = 0;


            //* PLAN DE DESARROLLO POR DEPENDENCIA/SECRETARIA
            // Almacena en un vector segun el ID de la dependencia - N° de NIVEL4 (ACTIVIDADES) a su cargo
            $vectorAcumNivel4General[$entidad->id] = $acumNivel4General;
            // Calcula y almacena en un vector segurn ID de la dependencia - PORCENTAJE cumplimiento MINI PLAN DE DESARROLLO cuatrienio
            if ($acumNivel4General != 0) 
                $vectorPorcentajePlanDesarrollo[$entidad->id] = round(($acumImpactoIndicador2020General/$acumNivel4General),2);
            else
                $vectorPorcentajePlanDesarrollo[$entidad->id] = 0;

        }

        
        // Tipo 1 | Grafica avance Plan de Accion (Vigencia)
        if ($_GET['tipo'] == 1) {
            return view('planaccion.graficaavanceporsecretaria',array(
                'nombresSecretarias' => $nombresSecretarias,
                'vectorAcumAccionesGeneral' => $vectorAcumAccionesGeneral,
                'vectorPorcentajePlanAccion' => $vectorPorcentajePlanAccion
            ));
        }

        // Tipo 2 | Grafica avance Plan de Desarrollo
        if ($_GET['tipo'] == 2) {
            return view('plandesarrollo.graficaavanceporsecretaria',array(
                'nombresSecretarias' => $nombresSecretarias,
                'vectorAcumNivel4General' => $vectorAcumNivel4General,
                'vectorPorcentajePlanDesarrollo' => $vectorPorcentajePlanDesarrollo
            ));
        }

        // Tipo 3 | Grafica semaforos de cumplimiento ( Plan de Accion - Plan Desarrollo )
        if ($_GET['tipo'] == 3) {
            return view('plandesarrollo.graficaavancesemaforos',array(
                'nombresSecretarias' => $nombresSecretarias,
                'vectorAcumNivel4General' => $vectorAcumNivel4General,
                'vectorPorcentajePlanAccion' => $vectorPorcentajePlanAccion,
                'vectorPorcentajePlanDesarrollo' => $vectorPorcentajePlanDesarrollo,
                'vectorMetaNumero' => $metaNumero,
                'vectorMetaNombre' => $metaNombre,
                'vectorMetaSecretaria' => $metaSecretaria,
                'vectorMetaCumplimientoPlanAccion' => $metaCumplimientoPlanAccion,
                'vectorMetaCumplimientoPlanDesarrollo' => $metaCumplimientoPlanDesarrollo
            ));
        }

    } 

    /**
     * Calcula y regenera niveles (Para TODAS las metas) de ejecucion tablas PLAN ACCION -> PLAN INDICATIVO -> INDICADOR 
     * @return \Illuminate\Http\Response
     */
    public function regenerarNivelesEjecucionTodasMetas()
    {
        //Ampliacion a 10 minutos el limite de tiempo por ser una consulta extensa
        set_time_limit(600);

        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))
                            ->with('administracion')
                            ->get();

        //Hace una primer busqueda GENERAL
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','nivel3.nivel2.nivel1.plandesarrollo')
                                    ->get();
    
        //Carga TODOS los indicadores
        $medicionIndicador = MedicionIndicador::orderBy('nivel4_id')
                                ->with('unidadMedida','vigenciaBase','Medida','Tipo','Nivel4')
                                ->get(); 

        //Carga TODO el plan indicativo
        $planIndicativo = PlanIndicativo::orderBy('vigencia_id')
                            ->with('indicador','vigencia','indicador.unidadMedida','indicador.Medida', 'indicador.Tipo', 'indicador.Nivel4', 'indicador.Nivel4.nivel3', 'indicador.Nivel4.nivel3.nivel2','indicador.Nivel4.nivel3.nivel2.nivel1','indicador.Nivel4.nivel3.nivel2.nivel1.plandesarrollo','indicador.Nivel4.entidadOficina')
                            ->get();

        //Carga TODO el plan de accion (TODAS las acciones inscritas)
        $planAccion = PlanAccion::orderBy('plan_indicativo_id')
                            ->with('planIndicativo')
                            ->get();

        //Carga TODAS las Tareas
        $tarea = Tarea::orderBy('id')
                    ->get();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')
                            ->get();


        //* INICIA fecha corte personalizada para calculo de acumuladores
        $fechaCorte = new \DateTime(); 
        if (isset($_GET['fecha_corte']))
            $fechaCorte = $_GET['fecha_corte'];
        //* FIN fecha corte personalizada para calculo de acumuladores


        //* Recorre todas las DEPENDENCIAS (OFICINA)
        foreach($entidadOficina as $entidad) {

            //* Recorre todos los NIVEL4 (ACTIVIDADES) previamente filtradas
            foreach ($planDesarrolloNivel4->where('oficina_id', $entidad->id) as $Nivel4) {

                //* Recorre todos los INDICADORES relacionados con cada NIVEL4 (ACTIVIDAD)
                foreach ($medicionIndicador->where('nivel4_id', $Nivel4->id) as $indicador) {

                    //* Recorre todos los PLANES INDICATIVOS relacionados con cada INDICADOR y para una VIGENCIA especifica
                    for ($vigenciaCalcular = 12; $vigenciaCalcular <= 15; $vigenciaCalcular++) {

                        foreach ($planIndicativo->where('indicador_id', $indicador->id)->where('vigencia_id', $vigenciaCalcular) as $indicativo) {

                            // Inicializa Contador acumulado de ponderacion por CAMBIO DE ITEM PLAN INDICATIVO
                            $acumProporcionalPonderadoAccion = 0;

                            //* Recorreo todas las ACCIONES relacionadas con cada PLAN INDICATIVO 
                            foreach ($planAccion->where('plan_indicativo_id', $indicativo->id) as $accion) {

                                // Inicializa Contador acumulado de impacto KPI tareas reportadas
                                $acumImpactoKPI = 0;
                                // Inicializa por defecto en 0% una variable para almacenar "% de Cumplimiento accion"
                                $auxCumplimientoAccion = 0;

                                // *** INICIO calculo ACUMULADORES
                                //* Recorreo todas las TAREAS relacionadas con cada ACCION
                                foreach ($tarea->where('accion_id', $accion->id)->where('updated_at','<',$fechaCorte) as $registro) {
                                    $acumImpactoKPI = $acumImpactoKPI + $registro->impacto_kpi; // Acumula el impacto al KPI reportado en las tareas
                                }

                                // Verifica para evitar division Zero cuando no se tiene objetivo
                                if (($accion->objetivo != '') && ($accion->objetivo > '0')) {

                                    // Variable auxiliar "% de Cumplimiento accion" para posterior calculo del proporcional al ponderado
                                    $auxCumplimientoAccion = ($acumImpactoKPI * 1) / $accion->objetivo;

                                }
                                // *** FIN calculo ACUMULADORES

                                // *** INICIO calculo PONDERADOS
                                // Evita division Zero cuando no se tiene objetivo
                                if (($accion->objetivo != '') && ($accion->objetivo > '0')) {
                                    $proporcionalPonderadoAccion = ($auxCumplimientoAccion * $accion->ponderacion) / 1;
                                } else {
                                    $proporcionalPonderadoAccion = 0;
                                }

                                // Valida y en caso de sobreejecucion del ponderado limita al valor maximo inscrito como ponderado para la accion
                                if ($proporcionalPonderadoAccion > $accion->ponderacion ) $proporcionalPonderadoAccion = $accion->ponderacion;

                                $acumProporcionalPonderadoAccion = $acumProporcionalPonderadoAccion + $proporcionalPonderadoAccion;

                                // *** FIN calculo PONDERADOS


                                //? --------------------------------------------------------------------------------------------------
                                //? FASE NUMERO - 1
                                //? ALMACENA niveles de avance DIRECTAMENTE en la 3 ultimas columnas de la TABLA PLAN ACCION
                                //? Regenera las columnas valor_realizado | porcentaje_realizado | rezago de la tabla plan_accions
                                //? --------------------------------------------------------------------------------------------------
                                $auxPlanAccion = PlanAccion::find($accion->id);
                                $auxPlanAccion->valor_realizado = $acumImpactoKPI;
                                $auxPlanAccion->porcentaje_realizado = $auxCumplimientoAccion;
                                $auxPlanAccion->ponderado_realizado = $proporcionalPonderadoAccion;
                                $auxPlanAccion->rezago = $accion->objetivo - $auxPlanAccion->valor_realizado;
                                $auxPlanAccion->save();
                                //? FIN ----------------------------------------------------------------------------------------------

                            }


                            // Diferente de CERO - Calcula dividiendo por el objetivo
                            if ($indicador->objetivo != 0) {

                                // Calcula el impacto al indicador en cantidades y en terminos de porcentajes
                                $impactoIndicador = ($indicativo->valor * $acumProporcionalPonderadoAccion) / 1;
                                $porcentajeImpactoIndicador = (($impactoIndicador * 1) / $indicador->objetivo);

                            }

                            // CERO y tipo MANTENIMIENTO - Calcula dividiendo por la linea base multiplicado por 4
                            if (($indicador->objetivo == 0) && ($indicador->tipo_id == 3)) {

                                // Calcula el impacto al indicador en cantidades y en terminos de porcentajes
                                $impactoIndicador = ($indicativo->valor * $acumProporcionalPonderadoAccion) / 1;
                                $porcentajeImpactoIndicador = (($impactoIndicador * 1) / ($indicador->linea_base * 4)); // Nor remitimos a la linea base por ser de Mantenimiento

                            }

                            // CERO y tipo NO MANTENIMIENTO - Igual a cero
                            if (($indicador->objetivo == 0) && ($indicador->tipo_id != 3)) {

                                // Calcula el impacto al indicador en cantidades y en terminos de porcentajes
                                $impactoIndicador = 0; // Se lleva a 0 unidades por ser aciones informativas sin objetivo en el indicador para medir
                                $porcentajeImpactoIndicador = 0; // Se lleva a 0 % por ser aciones informativas sin objetivo en el indicador para medir

                            }

                            //? --------------------------------------------------------------------------------------------------
                            //? FASE NUMERO - 2
                            //? ALMACENA niveles de avance DIRECTAMENTE en la 3 ultimas columnas de la TABLA PLAN INDICATIVO
                            //? Regenera las columnas valor_realizado | porcentaje_realizado | rezago de la tabla plan_indicativos
                            //? --------------------------------------------------------------------------------------------------
                            $auxPlanIndicativo = PlanIndicativo::find($indicativo->id);
                            $auxPlanIndicativo->valor_realizado = (($indicativo->valor * $acumProporcionalPonderadoAccion) / 1);
                            if ($indicativo->valor != 0) 
                                $auxPlanIndicativo->porcentaje_realizado = (($auxPlanIndicativo->valor_realizado * 1) / $indicativo->valor);
                            else
                                $auxPlanIndicativo->porcentaje_realizado = 'NP';
                            $auxPlanIndicativo->rezago = $indicativo->valor - $auxPlanIndicativo->valor_realizado;
                            $auxPlanIndicativo->save();
                            //? FIN ----------------------------------------------------------------------------------------------


                            //? --------------------------------------------------------------------------------------------------
                            //? FASE NUMERO - 3
                            //? ALMACENA niveles de avance DIRECTAMENTE en la 3 ultimas columnas de la TABLA MEDICION INDICADORES
                            //? Regenera las columnas valor_realizado | porcentaje_realizado | rezago de la tabla medicion_indicadors
                            //? --------------------------------------------------------------------------------------------------
                            $auxIndicador = MedicionIndicador::find($indicador->id);

                            if ($vigenciaCalcular == 12) $auxIndicador->valor_realizado = 0; //? Validacion previa PRIMERA VIGIENCIA para limpiar el contenido antes de acumular
                            if ($vigenciaCalcular == 12) $auxIndicador->porcentaje_realizado = 0; //? Validacion previa PRIMERA VIGIENCIA para limpiar el contenido antes de acumular

                            $auxIndicador->valor_realizado = $auxIndicador->valor_realizado + $impactoIndicador; //? Acumulativo
                            $auxIndicador->porcentaje_realizado = $auxIndicador->porcentaje_realizado + $porcentajeImpactoIndicador; //? Acumulativo
                            if ($indicador->tipo_id == 3)
                                $auxIndicador->rezago = ($indicador->linea_base * 2) - $auxIndicador->valor_realizado; //! OJO AJUSTE MANUAL - Se multiplica por el N° de la vigencia actual (1,2..4)
                            else
                                $auxIndicador->rezago = $indicador->objetivo - $auxIndicador->valor_realizado;
                            $auxIndicador->save();
                            //? FIN ----------------------------------------------------------------------------------------------

                        }

                    }
                    
                }

            } 


        }

        return view('portada');

    } 


}
