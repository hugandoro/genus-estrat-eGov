<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\PlanDesarrolloNivel4;

class plan_desarrollo_nivel4s_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlanDesarrolloNivel4::create([
            'nivel3_id'             => '1',
            'numeral'               => '1',
            'nombre'                => 'Meta A',
            'objetivo'           => 'Texto descriptivo de la meta A',
            'oficina_id'            => '1',
        ]);

        PlanDesarrolloNivel4::create([
            'nivel3_id'             => '2',
            'numeral'               => '2',
            'nombre'                => 'Meta B',
            'objetivo'           => 'Texto descriptivo de la meta B',
            'oficina_id'            => '2',
        ]);

        PlanDesarrolloNivel4::create([
            'nivel3_id'             => '3',
            'numeral'               => '3',
            'nombre'                => 'Meta C',
            'objetivo'           => 'Texto descriptivo de la meta C',
            'oficina_id'            => '3',
        ]);

        PlanDesarrolloNivel4::create([
            'nivel3_id'             => '4',
            'numeral'               => '4',
            'nombre'                => 'Meta D',
            'objetivo'           => 'Texto descriptivo de la meta D',
            'oficina_id'            => '1',
        ]);
    }
}
