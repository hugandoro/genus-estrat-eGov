<?php

namespace App\Exports;

use App\Tarea;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

class Tareas2020Export implements FromView
{
    public function view(): View
    {
        return view('tarea.listargeneralexcel2020', [
            'tarea' => Tarea::orderBy('id','desc')->with(
                'accion',
                'accion.planIndicativo',
                'accion.planIndicativo.vigencia',
                'accion.planIndicativo.indicador',
                'accion.planIndicativo.indicador.Nivel4',
                'accion.planIndicativo.indicador.Nivel4.entidadOficina',
                'zona',
                'comuna',
                'corregimiento',
                'poblacionR',
                'sexo',
                'fuente1',
                'fuente2',
                'fuente3',
                'user'
            )->where('accion_id','<','1325')->get(),  //! Vigencia 2020 - Plan Accion ID entre del 1 al 1324 
        ]);
    }
}
