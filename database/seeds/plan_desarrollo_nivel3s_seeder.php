<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\PlanDesarrolloNivel3;

class plan_desarrollo_nivel3s_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlanDesarrolloNivel3::create([
            'nivel2_id'             => '1',
            'numeral'               => '1',
            'nombre'                => 'Objetivo AA',
            'descripcion'           => 'Texto descriptivo del objetivo AA',
        ]);

        PlanDesarrolloNivel3::create([
            'nivel2_id'             => '2',
            'numeral'               => '1',
            'nombre'                => 'Objetivo BB',
            'descripcion'           => 'Texto descriptivo del objetivo BB',
        ]);

        PlanDesarrolloNivel3::create([
            'nivel2_id'             => '3',
            'numeral'               => '1',
            'nombre'                => 'Objetivo CC',
            'descripcion'           => 'Texto descriptivo del objetivo CC',
        ]);

        PlanDesarrolloNivel3::create([
            'nivel2_id'             => '4',
            'numeral'               => '1',
            'nombre'                => 'Objetivo DD',
            'descripcion'           => 'Texto descriptivo del objetivo DD',
        ]);
    }
}
