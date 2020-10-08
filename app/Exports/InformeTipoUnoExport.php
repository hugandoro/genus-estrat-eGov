<?php

namespace App\Exports;

use App\Tarea;
use App\PlanDesarrolloNivel4;
use App\PlanIndicativo;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

class InformeTipoUnoExport implements FromView
{
    //** INFORME TIPO UNO **********************************************************************************************************************************
    //Listado de todas las metas con descripcion, responsable, programada para 2020 (SI/NO), acumulado de tareas reportadas, objetivo 2020 impactado (SI/NO)
    //******************************************************************************************************************************************************

    public function view(): View
    {
        return view('informe.tipounoexcel', [
            'nivel4' => PlanDesarrolloNivel4::orderBy('id','asc')->with(            //Carga todo el plan de desarrollo
                'entidadOficina'
            )->get(),
            'planIndicativo' => PlanIndicativo::where('vigencia_id','12')->get(),   //Carga el plan indicativo SOLO de la vigencia 2020
            'tarea' => Tarea::orderBy('id','desc')->with(                           //Carga todas las tareas reportadas a la fecha y hora
                'accion',
                'accion.planIndicativo',
                'accion.planIndicativo.vigencia',
                'accion.planIndicativo.indicador',
                'accion.planIndicativo.indicador.Nivel4',
                'accion.planIndicativo.indicador.Nivel4.entidadOficina'
            )->get(),
        ]);
    }
}
