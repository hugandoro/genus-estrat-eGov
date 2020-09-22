<?php

namespace App\Exports;

use App\Tarea;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

class TareasExport implements FromView
{
    public function view(): View
    {
        return view('tarea.listargeneralexcel', [
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
            )->get(),
        ]);
    }
}
