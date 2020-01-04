<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\PlanDesarrolloNivel2;

class plan_desarrollo_nivel2s_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlanDesarrolloNivel2::create([
            'nivel1_id'             => '1',
            'numeral'               => '1',
            'nombre'                => 'Objetivo A',
            'descripcion'           => 'Texto descriptivo del objetivo A',
        ]);

        PlanDesarrolloNivel2::create([
            'nivel1_id'             => '2',
            'numeral'               => '1',
            'nombre'                => 'Objetivo B',
            'descripcion'           => 'Texto descriptivo del objetivo B',
        ]);

        PlanDesarrolloNivel2::create([
            'nivel1_id'             => '3',
            'numeral'               => '1',
            'nombre'                => 'Objetivo C',
            'descripcion'           => 'Texto descriptivo del objetivo C',
        ]);

        PlanDesarrolloNivel2::create([
            'nivel1_id'             => '4',
            'numeral'               => '1',
            'nombre'                => 'Objetivo D',
            'descripcion'           => 'Texto descriptivo del objetivo D',
        ]);
    }
}
