<?php

namespace App\Exports;

use App\Tarea;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

class Tareas2023Export implements FromView
{
    public function view(): View
    {
        return view('tarea.listargeneralexcel2023', [
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
            ) ->where('accion_id','>','5710')->get(),  //! Vigencia 2022 - Plan Accion ID entre del 5711 al 7007
        ]);
    }
}