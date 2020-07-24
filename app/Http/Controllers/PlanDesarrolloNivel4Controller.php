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

}
