<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModuloMipgNivel1;
use App\ModuloMipgNivel2;
use App\ModuloMipgNivel3;
use App\ModuloMipgNivel4;
use App\EntidadOficina;
use App\ModuloMipgTarea;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MedicionIndicadorController;

class MipgPlanAccionController extends Controller
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
     * VIGENCIA 2021 - Listar GLOBALMENTE todo el plan de accion MIPG - Vigencia 2021
     * @return \Illuminate\Http\Response
     */
    public function listarRegistros2021()
    {
        $moduloMipgNivel1 = ModuloMipgNivel1::orderBy('numeral')->get();
        $moduloMipgNivel2 = ModuloMipgNivel2::orderBy('numeral')->get();
        $moduloMipgNivel3 = ModuloMipgNivel3::orderBy('numeral')->get();

        //Hace una primer busqueda GENERAL
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')->paginate(10);

        //Valida si trae un filtro de busqueda por SECRETARIA | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                        ->where('oficina_id', $_GET['filtroSecretaria'])
                                        ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                        ->paginate(10);

        //Valida si trae un filtro de busqueda por DIMENSION | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS           
        if ((isset($_GET['filtroDimension'])) && ($_GET['filtroDimension'] != '9999')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('modulo_mipg_nivel4s.numeral')
                                ->join('modulo_mipg_nivel3s','modulo_mipg_nivel4s.nivel3_id','=','modulo_mipg_nivel3s.id')
                                ->join('modulo_mipg_nivel2s','modulo_mipg_nivel3s.nivel2_id','=','modulo_mipg_nivel2s.id')
                                ->join('modulo_mipg_nivel1s','modulo_mipg_nivel2s.nivel1_id','=','modulo_mipg_nivel1s.id')

                                ->where('modulo_mipg_nivel1s.id', $_GET['filtroDimension'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(10);  

        //Valida si trae un filtro de busqueda por POLITICA | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS           
        if ((isset($_GET['filtropolitica'])) && ($_GET['filtropolitica'] != '9999')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('modulo_mipg_nivel4s.numeral')
                                ->join('modulo_mipg_nivel3s','modulo_mipg_nivel4s.nivel3_id','=','modulo_mipg_nivel3s.id')
                                ->join('modulo_mipg_nivel2s','modulo_mipg_nivel3s.nivel2_id','=','modulo_mipg_nivel2s.id')

                                ->where('modulo_mipg_nivel2s.id', $_GET['filtropolitica'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(10);                                      

        //Valida si trae un filtro de busqueda por PALABRAS CLAVE          
        if ((isset($_GET['filtropalabras'])) && ($_GET['filtropalabras'] != '')){ 
            $filtropalabra = $_GET['filtropalabras'];
            $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                    ->where('accion', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('descripcion_corta', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('descripcion_larga', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('unidad_medida', 'LIKE', "%$filtropalabra%")
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                    ->paginate(10);
        }
        
        //Valida si trae un filtro de busqueda por ACTIVIDAD (N° ACCION)       
        if ((isset($_GET['filtroactividad'])) && ($_GET['filtroactividad'] != '')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                ->where('numeral', $_GET['filtroactividad'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(1);

        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $moduloMipgNivel4->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();
        return view('modulomipg.listarplanaccion2021', compact('moduloMipgNivel1','moduloMipgNivel2','moduloMipgNivel3','moduloMipgNivel4','entidadOficina','pagination'));
    }

    /**
     * VIGENCIA 2022 - Listar GLOBALMENTE todo el plan de accion MIPG - Vigencia 2022
     * @return \Illuminate\Http\Response
     */
    public function listarRegistros2022()
    {
        $moduloMipgNivel1 = ModuloMipgNivel1::orderBy('numeral')->get();
        $moduloMipgNivel2 = ModuloMipgNivel2::orderBy('numeral')->get();
        $moduloMipgNivel3 = ModuloMipgNivel3::orderBy('numeral')->get();

        //Hace una primer busqueda GENERAL
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')->paginate(10);

        //Valida si trae un filtro de busqueda por SECRETARIA | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                        ->where('oficina_id', $_GET['filtroSecretaria'])
                                        ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                        ->paginate(10);

        //Valida si trae un filtro de busqueda por DIMENSION | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS           
        if ((isset($_GET['filtroDimension'])) && ($_GET['filtroDimension'] != '9999')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('modulo_mipg_nivel4s.numeral')
                                ->join('modulo_mipg_nivel3s','modulo_mipg_nivel4s.nivel3_id','=','modulo_mipg_nivel3s.id')
                                ->join('modulo_mipg_nivel2s','modulo_mipg_nivel3s.nivel2_id','=','modulo_mipg_nivel2s.id')
                                ->join('modulo_mipg_nivel1s','modulo_mipg_nivel2s.nivel1_id','=','modulo_mipg_nivel1s.id')

                                ->where('modulo_mipg_nivel1s.id', $_GET['filtroDimension'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(10);  

        //Valida si trae un filtro de busqueda por POLITICA | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS           
        if ((isset($_GET['filtropolitica'])) && ($_GET['filtropolitica'] != '9999')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('modulo_mipg_nivel4s.numeral')
                                ->join('modulo_mipg_nivel3s','modulo_mipg_nivel4s.nivel3_id','=','modulo_mipg_nivel3s.id')
                                ->join('modulo_mipg_nivel2s','modulo_mipg_nivel3s.nivel2_id','=','modulo_mipg_nivel2s.id')

                                ->where('modulo_mipg_nivel2s.id', $_GET['filtropolitica'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(10);                                      

        //Valida si trae un filtro de busqueda por PALABRAS CLAVE          
        if ((isset($_GET['filtropalabras'])) && ($_GET['filtropalabras'] != '')){ 
            $filtropalabra = $_GET['filtropalabras'];
            $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                    ->where('accion', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('descripcion_corta', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('descripcion_larga', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('unidad_medida', 'LIKE', "%$filtropalabra%")
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                    ->paginate(10);
        }
        
        //Valida si trae un filtro de busqueda por ACTIVIDAD (N° ACCION)       
        if ((isset($_GET['filtroactividad'])) && ($_GET['filtroactividad'] != '')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                ->where('numeral', $_GET['filtroactividad'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(1);

        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $moduloMipgNivel4->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();
        return view('modulomipg.listarplanaccion2022', compact('moduloMipgNivel1','moduloMipgNivel2','moduloMipgNivel3','moduloMipgNivel4','entidadOficina','pagination'));
    }

    /**
     * VIGENCIA 2023 - Listar GLOBALMENTE todo el plan de accion MIPG - Vigencia 2023
     * @return \Illuminate\Http\Response
     */
    public function listarRegistros2023()
    {
        $moduloMipgNivel1 = ModuloMipgNivel1::orderBy('numeral')->get();
        $moduloMipgNivel2 = ModuloMipgNivel2::orderBy('numeral')->get();
        $moduloMipgNivel3 = ModuloMipgNivel3::orderBy('numeral')->get();

        //Hace una primer busqueda GENERAL
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')->paginate(10);

        //Valida si trae un filtro de busqueda por SECRETARIA | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                        ->where('oficina_id', $_GET['filtroSecretaria'])
                                        ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                        ->paginate(10);

        //Valida si trae un filtro de busqueda por DIMENSION | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS           
        if ((isset($_GET['filtroDimension'])) && ($_GET['filtroDimension'] != '9999')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('modulo_mipg_nivel4s.numeral')
                                ->join('modulo_mipg_nivel3s','modulo_mipg_nivel4s.nivel3_id','=','modulo_mipg_nivel3s.id')
                                ->join('modulo_mipg_nivel2s','modulo_mipg_nivel3s.nivel2_id','=','modulo_mipg_nivel2s.id')
                                ->join('modulo_mipg_nivel1s','modulo_mipg_nivel2s.nivel1_id','=','modulo_mipg_nivel1s.id')

                                ->where('modulo_mipg_nivel1s.id', $_GET['filtroDimension'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(10);  

        //Valida si trae un filtro de busqueda por POLITICA | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS           
        if ((isset($_GET['filtropolitica'])) && ($_GET['filtropolitica'] != '9999')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('modulo_mipg_nivel4s.numeral')
                                ->join('modulo_mipg_nivel3s','modulo_mipg_nivel4s.nivel3_id','=','modulo_mipg_nivel3s.id')
                                ->join('modulo_mipg_nivel2s','modulo_mipg_nivel3s.nivel2_id','=','modulo_mipg_nivel2s.id')

                                ->where('modulo_mipg_nivel2s.id', $_GET['filtropolitica'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(10);                                      

        //Valida si trae un filtro de busqueda por PALABRAS CLAVE          
        if ((isset($_GET['filtropalabras'])) && ($_GET['filtropalabras'] != '')){ 
            $filtropalabra = $_GET['filtropalabras'];
            $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                    ->where('accion', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('descripcion_corta', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('descripcion_larga', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('unidad_medida', 'LIKE', "%$filtropalabra%")
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                    ->paginate(10);
        }
        
        //Valida si trae un filtro de busqueda por ACTIVIDAD (N° ACCION)       
        if ((isset($_GET['filtroactividad'])) && ($_GET['filtroactividad'] != '')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                ->where('numeral', $_GET['filtroactividad'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(1);

        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $moduloMipgNivel4->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();
        return view('modulomipg.listarplanaccion2023', compact('moduloMipgNivel1','moduloMipgNivel2','moduloMipgNivel3','moduloMipgNivel4','entidadOficina','pagination'));
    }

    /**
     * VIGENCIA 2021 - Listar GLOBALMENTE todo el plan de accion MIPG - Vigencia 2021 - Para REPORTAR
     * @return \Illuminate\Http\Response
     */
    public function listarRegistrosReporte2021()
    {
        $moduloMipgNivel1 = ModuloMipgNivel1::orderBy('numeral')->get();
        $moduloMipgNivel2 = ModuloMipgNivel2::orderBy('numeral')->get();
        $moduloMipgNivel3 = ModuloMipgNivel3::orderBy('numeral')->get();

        //Hace una primer busqueda GENERAL
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')->paginate(10);

        //Valida si trae un filtro de busqueda por SECRETARIA | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                        ->where('oficina_id', $_GET['filtroSecretaria'])
                                        ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                        ->paginate(10);

        //Valida si trae un filtro de busqueda por DIMENSION | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS           
        if ((isset($_GET['filtroDimension'])) && ($_GET['filtroDimension'] != '9999')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('modulo_mipg_nivel4s.numeral')
                                ->join('modulo_mipg_nivel3s','modulo_mipg_nivel4s.nivel3_id','=','modulo_mipg_nivel3s.id')
                                ->join('modulo_mipg_nivel2s','modulo_mipg_nivel3s.nivel2_id','=','modulo_mipg_nivel2s.id')
                                ->join('modulo_mipg_nivel1s','modulo_mipg_nivel2s.nivel1_id','=','modulo_mipg_nivel1s.id')

                                ->where('modulo_mipg_nivel1s.id', $_GET['filtroDimension'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(10);  

        //Valida si trae un filtro de busqueda por POLITICA | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS           
        if ((isset($_GET['filtropolitica'])) && ($_GET['filtropolitica'] != '9999')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('modulo_mipg_nivel4s.numeral')
                                ->join('modulo_mipg_nivel3s','modulo_mipg_nivel4s.nivel3_id','=','modulo_mipg_nivel3s.id')
                                ->join('modulo_mipg_nivel2s','modulo_mipg_nivel3s.nivel2_id','=','modulo_mipg_nivel2s.id')

                                ->where('modulo_mipg_nivel2s.id', $_GET['filtropolitica'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(10);                                      

        //Valida si trae un filtro de busqueda por PALABRAS CLAVE          
        if ((isset($_GET['filtropalabras'])) && ($_GET['filtropalabras'] != '')){ 
            $filtropalabra = $_GET['filtropalabras'];
            $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                    ->where('accion', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('descripcion_corta', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('descripcion_larga', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('unidad_medida', 'LIKE', "%$filtropalabra%")
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                    ->paginate(10);
        }

        //Valida si trae un filtro de busqueda por ACTIVIDAD (N° ACCION)       
        if ((isset($_GET['filtroactividad'])) && ($_GET['filtroactividad'] != '')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                ->where('numeral', $_GET['filtroactividad'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(1);
                              
        
        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $moduloMipgNivel4->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODAS las Tareas
        $tarea = ModuloMipgTarea::orderBy('id')->get();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();

        return view('modulomipg.listarplanaccionreporte2021', compact('moduloMipgNivel1','moduloMipgNivel2','moduloMipgNivel3','moduloMipgNivel4','tarea','entidadOficina','pagination'));
    }

    /**
     * VIGENCIA 2022 - Listar GLOBALMENTE todo el plan de accion MIPG - Vigencia 2022 - Para REPORTAR
     * @return \Illuminate\Http\Response
     */
    public function listarRegistrosReporte2022()
    {
        $moduloMipgNivel1 = ModuloMipgNivel1::orderBy('numeral')->get();
        $moduloMipgNivel2 = ModuloMipgNivel2::orderBy('numeral')->get();
        $moduloMipgNivel3 = ModuloMipgNivel3::orderBy('numeral')->get();

        //Hace una primer busqueda GENERAL
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')->paginate(10);

        //Valida si trae un filtro de busqueda por SECRETARIA | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                        ->where('oficina_id', $_GET['filtroSecretaria'])
                                        ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                        ->paginate(10);

        //Valida si trae un filtro de busqueda por DIMENSION | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS           
        if ((isset($_GET['filtroDimension'])) && ($_GET['filtroDimension'] != '9999')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('modulo_mipg_nivel4s.numeral')
                                ->join('modulo_mipg_nivel3s','modulo_mipg_nivel4s.nivel3_id','=','modulo_mipg_nivel3s.id')
                                ->join('modulo_mipg_nivel2s','modulo_mipg_nivel3s.nivel2_id','=','modulo_mipg_nivel2s.id')
                                ->join('modulo_mipg_nivel1s','modulo_mipg_nivel2s.nivel1_id','=','modulo_mipg_nivel1s.id')

                                ->where('modulo_mipg_nivel1s.id', $_GET['filtroDimension'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(10);  

        //Valida si trae un filtro de busqueda por POLITICA | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS           
        if ((isset($_GET['filtropolitica'])) && ($_GET['filtropolitica'] != '9999')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('modulo_mipg_nivel4s.numeral')
                                ->join('modulo_mipg_nivel3s','modulo_mipg_nivel4s.nivel3_id','=','modulo_mipg_nivel3s.id')
                                ->join('modulo_mipg_nivel2s','modulo_mipg_nivel3s.nivel2_id','=','modulo_mipg_nivel2s.id')

                                ->where('modulo_mipg_nivel2s.id', $_GET['filtropolitica'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(10);                                      

        //Valida si trae un filtro de busqueda por PALABRAS CLAVE          
        if ((isset($_GET['filtropalabras'])) && ($_GET['filtropalabras'] != '')){ 
            $filtropalabra = $_GET['filtropalabras'];
            $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                    ->where('accion', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('descripcion_corta', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('descripcion_larga', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('unidad_medida', 'LIKE', "%$filtropalabra%")
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                    ->paginate(10);
        }

        //Valida si trae un filtro de busqueda por ACTIVIDAD (N° ACCION)       
        if ((isset($_GET['filtroactividad'])) && ($_GET['filtroactividad'] != '')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                ->where('numeral', $_GET['filtroactividad'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(1);
                              
        
        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $moduloMipgNivel4->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODAS las Tareas
        $tarea = ModuloMipgTarea::orderBy('id')->get();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();

        return view('modulomipg.listarplanaccionreporte2022', compact('moduloMipgNivel1','moduloMipgNivel2','moduloMipgNivel3','moduloMipgNivel4','tarea','entidadOficina','pagination'));
    }

    /**
     * VIGENCIA 2023 - Listar GLOBALMENTE todo el plan de accion MIPG - Vigencia 2023 - Para REPORTAR
     * @return \Illuminate\Http\Response
     */
    public function listarRegistrosReporte2023()
    {
        $moduloMipgNivel1 = ModuloMipgNivel1::orderBy('numeral')->get();
        $moduloMipgNivel2 = ModuloMipgNivel2::orderBy('numeral')->get();
        $moduloMipgNivel3 = ModuloMipgNivel3::orderBy('numeral')->get();

        //Hace una primer busqueda GENERAL
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')->paginate(10);

        //Valida si trae un filtro de busqueda por SECRETARIA | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                        ->where('oficina_id', $_GET['filtroSecretaria'])
                                        ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                        ->paginate(10);

        //Valida si trae un filtro de busqueda por DIMENSION | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS           
        if ((isset($_GET['filtroDimension'])) && ($_GET['filtroDimension'] != '9999')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('modulo_mipg_nivel4s.numeral')
                                ->join('modulo_mipg_nivel3s','modulo_mipg_nivel4s.nivel3_id','=','modulo_mipg_nivel3s.id')
                                ->join('modulo_mipg_nivel2s','modulo_mipg_nivel3s.nivel2_id','=','modulo_mipg_nivel2s.id')
                                ->join('modulo_mipg_nivel1s','modulo_mipg_nivel2s.nivel1_id','=','modulo_mipg_nivel1s.id')

                                ->where('modulo_mipg_nivel1s.id', $_GET['filtroDimension'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(10);  

        //Valida si trae un filtro de busqueda por POLITICA | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS           
        if ((isset($_GET['filtropolitica'])) && ($_GET['filtropolitica'] != '9999')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('modulo_mipg_nivel4s.numeral')
                                ->join('modulo_mipg_nivel3s','modulo_mipg_nivel4s.nivel3_id','=','modulo_mipg_nivel3s.id')
                                ->join('modulo_mipg_nivel2s','modulo_mipg_nivel3s.nivel2_id','=','modulo_mipg_nivel2s.id')

                                ->where('modulo_mipg_nivel2s.id', $_GET['filtropolitica'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(10);                                      

        //Valida si trae un filtro de busqueda por PALABRAS CLAVE          
        if ((isset($_GET['filtropalabras'])) && ($_GET['filtropalabras'] != '')){ 
            $filtropalabra = $_GET['filtropalabras'];
            $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                    ->where('accion', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('descripcion_corta', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('descripcion_larga', 'LIKE', "%$filtropalabra%")
                                    ->orwhere('unidad_medida', 'LIKE', "%$filtropalabra%")
                                    ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                    ->paginate(10);
        }

        //Valida si trae un filtro de busqueda por ACTIVIDAD (N° ACCION)       
        if ((isset($_GET['filtroactividad'])) && ($_GET['filtroactividad'] != '')) 
        $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                ->where('numeral', $_GET['filtroactividad'])
                                ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                ->paginate(1);
                              
        
        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $moduloMipgNivel4->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODAS las Tareas
        $tarea = ModuloMipgTarea::orderBy('id')->get();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();

        return view('modulomipg.listarplanaccionreporte2023', compact('moduloMipgNivel1','moduloMipgNivel2','moduloMipgNivel3','moduloMipgNivel4','tarea','entidadOficina','pagination'));
    }



}
