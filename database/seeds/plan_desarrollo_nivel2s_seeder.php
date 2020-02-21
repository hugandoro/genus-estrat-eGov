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
            'objetivo'           => 'Texto descriptivo del objetivo A',
        ]);

        PlanDesarrolloNivel2::create([
            'nivel1_id'             => '2',
            'numeral'               => '2',
            'nombre'                => 'Objetivo B',
            'objetivo'           => 'Texto descriptivo del objetivo B',
        ]);

        PlanDesarrolloNivel2::create([
            'nivel1_id'             => '3',
            'numeral'               => '3',
            'nombre'                => 'Objetivo C',
            'objetivo'           => 'Texto descriptivo del objetivo C',
        ]);

        PlanDesarrolloNivel2::create([
            'nivel1_id'             => '4',
            'numeral'               => '4',
            'nombre'                => 'Objetivo D',
            'objetivo'           => 'Texto descriptivo del objetivo D',
        ]);
    }
}
