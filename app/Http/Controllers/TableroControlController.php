<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PlanDesarrollo;
use App\PlanDesarrolloNivel1;
use App\PlanDesarrolloNivel2;
use App\PlanDesarrolloNivel3;
use App\PlanDesarrolloNivel4;
use App\EntidadOficina;

use App\Tarea;
use App\PlanAccion;
use App\PlanIndicativo;
use App\MedicionIndicador;

use App\GeneralZona;
use App\GeograficaComuna;
use App\GeograficaCorregimiento;
use App\GeneralPoblacion;
use App\GeneralSexo;
use App\GeneralFuente;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TableroControlController extends Controller
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
     * Tablero de control CIFRAS CONSOLIDADAS
     * @return \Illuminate\Http\Response
     */
    public function tableroCifrasConsolidadas()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))->with('administracion')->get();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')->get();

        //Carga TODAS las actividades/metas
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
            ->with('entidadOficina', 'nivel3', 'nivel3.nivel2', 'nivel3.nivel2.nivel1', 'nivel3.nivel2.nivel1.plandesarrollo')
            ->get();
        $totalMetas = count($planDesarrolloNivel4);
        $totalMetasSecretaria = count($planDesarrolloNivel4);

        //Obtiene  el total de TAREAS
        $tarea = Tarea::orderBy('id', 'desc')->get();
        $totalTareas = count($tarea);

        //Valida si trae un filtro de busqueda por Secretaria | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) {
            $totalMetasSecretaria = 0;
            //Recorre todos los NIVEL4 (ACTIVIDADES) previamente filtradas
            foreach ($planDesarrolloNivel4->where('oficina_id', $_GET['filtroSecretaria']) as $Nivel4) {
                $totalMetasSecretaria = $totalMetasSecretaria + 1;
            }
        }

        return view('tablerocontrol.cifrasconsolidadas', compact('planDesarrollo', 'entidadOficina', 'totalTareas', 'totalMetas', 'totalMetasSecretaria'));
    }

    /**
     * Tablero de control PLAN DESARROLLO
     * @return \Illuminate\Http\Response
     */
    public function tableroPlanDesarrollo()
    {
        $planDesarrollo = PlanDesarrollo::where('administracion_id', config('app.administracion'))
            ->with('administracion')
            ->get();

        //Hace una primer busqueda GENERAL
        $planDesarrolloNivel4 = PlanDesarrolloNivel4::orderBy('numeral')
            ->with('entidadOficina', 'nivel3', 'nivel3.nivel2', 'nivel3.nivel2.nivel1', 'nivel3.nivel2.nivel1.plandesarrollo')
            ->get();
        $totalMetas = count($planDesarrolloNivel4);

        //Carga TODOS los indicadores
        $medicionIndicador = MedicionIndicador::orderBy('nivel4_id')
            ->with('unidadMedida', 'vigenciaBase', 'Medida', 'Tipo', 'Nivel4')
            ->get();

        //Carga TODAS las oficinas
        $entidadOficina = EntidadOficina::orderBy('nombre')
            ->get();


        //Inicializa arreglos de almacenamiento y asigna valores por defecto para la posicion 9999 (Toda la administracion)
        $nombresSecretarias[9999] = 'Toda la administracion';
        $secretariasPromedioCumplimientoPD[9999] = 0;
        $secretariasTotalMetasAsignadas[9999] = $totalMetas;

        //Recorre todas las DEPENDENCIAS (OFICINA)
        foreach ($entidadOficina as $entidad) {

            //Almacena en un arreglo el nombre de la dependencia
            $nombresSecretarias[$entidad->id] = $entidad->nombre;
            //Inicializa posicion en un arreglo basado en el ID de la entidad/dependencia para acumular PROCENTAJE cumplimiento de las metas a cargo
            $secretariasPromedioCumplimientoPD[$entidad->id] = 0;
            //Inicializa posicion en un arreglo basado en el ID de la entidad/dependencia para conteo N° de metas asignadas (A cargo)
            $secretariasTotalMetasAsignadas[$entidad->id] = 0;

            //Recorre todos los NIVEL4 (ACTIVIDADES) previamente filtradas
            foreach ($planDesarrolloNivel4->where('oficina_id', $entidad->id) as $Nivel4) {
                //Recorre todos los INDICADORES relacionados con cada NIVEL4 (ACTIVIDAD)
                foreach ($medicionIndicador->where('nivel4_id', $Nivel4->id) as $indicador) {
                    //Acumula porcentajes de cumplimiento de cada meta a su cargo
                    $secretariasPromedioCumplimientoPD[$entidad->id] = $secretariasPromedioCumplimientoPD[$entidad->id] + $indicador->porcentaje_realizado;
                    //Lleva conteo de numero de metas a cargo
                    $secretariasTotalMetasAsignadas[$entidad->id] = $secretariasTotalMetasAsignadas[$entidad->id] + 1;
                }
            }

            //Terminado de recorrer los NIVEL 4 (ACTIVIDADEs/METAS) de la dependencia, valida que tenga minimo 1 meta a cargo y divide el acumulado por el numero a cargo para sacar promedio
            if ($secretariasTotalMetasAsignadas[$entidad->id] != 0) {
                $secretariasPromedioCumplimientoPD[$entidad->id] = $secretariasPromedioCumplimientoPD[$entidad->id] / $secretariasTotalMetasAsignadas[$entidad->id];
                $secretariasPromedioCumplimientoPD[$entidad->id] = round($secretariasPromedioCumplimientoPD[$entidad->id], 4);
                $secretariasPromedioCumplimientoPD[$entidad->id] = $secretariasPromedioCumplimientoPD[$entidad->id] * 100;
            }
        }

        //Valida si trae un filtro de busqueda por Secretaria | Codigo 9999 equivale a que el usuario selecciono como filtro TODOS LOS REGISTROS
        $idSecretaria = 9999;
        if ((isset($_GET['filtroSecretaria'])) && ($_GET['filtroSecretaria'] != '9999')) {
            $idSecretaria = $_GET['filtroSecretaria'];
        }

        return view('tablerocontrol.plandesarrollo', compact('planDesarrollo', 'entidadOficina', 'totalMetas', 'idSecretaria'), array(
            'nombresSecretarias' => $nombresSecretarias,
            'secretariasPromedioCumplimientoPD' => $secretariasPromedioCumplimientoPD,
            'secretariasTotalMetasAsignadas' => $secretariasTotalMetasAsignadas,
        ));
    }

    /**
     * Tablero de control PLAN INDICATIVO
     * @return \Illuminate\Http\Response
     */
    public function tableroPlanIndicativo()
    {
    }
}
