<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModuloMipgNivel1;
use App\ModuloMipgNivel2;
use App\ModuloMipgNivel3;
use App\ModuloMipgNivel4;
use App\EntidadOficina;
use App\MedicionIndicador;

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

        //Valida si trae un filtro de busqueda por Secretaria | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) 
            $moduloMipgNivel4 = ModuloMipgNivel4::orderBy('numeral')
                                        ->where('oficina_id', $_GET['filtroSecretaria'])
                                        ->with('entidadOficina','nivel3','nivel3.nivel2','nivel3.nivel2.nivel1','Vigencia','Tipo','Medida')
                                        ->paginate(10);

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
        
        //Paginacion de resultados conservando el indice (Metodo GET y no POST)
        $pagination = $moduloMipgNivel4->appends(request () -> except (['page', '_token'])) -> links ();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();
        return view('modulomipg.listarplanaccion2021', compact('moduloMipgNivel1','moduloMipgNivel2','moduloMipgNivel3','moduloMipgNivel4','entidadOficina','pagination'));
    }


}
