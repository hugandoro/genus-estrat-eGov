<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\PlanDesarrolloRangoMedicion;

class plan_desarrollo_rango_medicions_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlanDesarrolloRangoMedicion::create([
            'plan_desarrollo_id'    => '1',
            'nombre'                => 'Cumplido',
            'color_hexa'            => '#00fd5d',
            'rango_inicial'         => '90',
            'rango_final'           => '100',
        ]);

        PlanDesarrolloRangoMedicion::create([
            'plan_desarrollo_id'    => '1',
            'nombre'                => 'En proceso',
            'color_hexa'            => '#fdd000',
            'rango_inicial'         => '20',
            'rango_final'           => '89',
        ]);

        PlanDesarrolloRangoMedicion::create([
            'plan_desarrollo_id'    => '1',
            'nombre'                => 'Retrasado',
            'color_hexa'            => '#cb3234 ',
            'rango_inicial'         => '0',
            'rango_final'           => '19',
        ]);
    }
}
