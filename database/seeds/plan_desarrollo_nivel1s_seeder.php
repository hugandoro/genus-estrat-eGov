<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\PlanDesarrolloNivel1;

class plan_desarrollo_nivel1s_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlanDesarrolloNivel1::create([
            'plan_desarrollo_id'    => '1',
            'numeral'               => '1',
            'nombre'                => 'Social',
            'objetivo'              => 'Igualdad social',
        ]);

        PlanDesarrolloNivel1::create([
            'plan_desarrollo_id'    => '1',
            'numeral'               => '2',
            'nombre'                => 'Seguridad',
            'objetivo'              => 'Seguridad para todos',
        ]);

        PlanDesarrolloNivel1::create([
            'plan_desarrollo_id'    => '1',
            'numeral'               => '3',
            'nombre'                => 'Economica',
            'objetivo'              => 'Desarrollo y progreso',
        ]);

        PlanDesarrolloNivel1::create([
            'plan_desarrollo_id'    => '1',
            'numeral'               => '4',
            'nombre'                => 'Institucional',
            'objetivo'              => 'Transparencia y efectividad',
        ]);
    }
}
