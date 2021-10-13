<?php

namespace App\Exports;

use App\Tarea;
use App\PlanDesarrolloNivel4;
use App\PlanIndicativo;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

class Informe2021TipoUnoExport implements FromView
{
    //** INFORME TIPO UNO **********************************************************************************************************************************
    //Listado de todas las metas con descripcion, responsable, programada para 2021 (SI/NO), acumulado de tareas reportadas, objetivo 2020 impactado (SI/NO)
    //******************************************************************************************************************************************************

    public function view(): View
    {
        set_time_limit(1200); //Ampliacion a 5 minutos el limite de tiempo por ser una consulta extensa

        return view('informe.tipounoexcel2021', [
            'nivel4' => PlanDesarrolloNivel4::orderBy('id','asc')->with(            //Carga todo el plan de desarrollo
                'entidadOficina'
            )->get(),
            'planIndicativo' => PlanIndicativo::where('vigencia_id','13')->get(),   //Carga el plan indicativo SOLO de la vigencia 2021
            //'tarea' => Tarea::orderBy('id','desc')->with(                         //Carga todas las tareas reportadas a la fecha y hora
            'tarea' => Tarea::where('id','>',3996)->with(  //Carga todas las tareas reportadas a la fecha y hora
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
