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
            'descripcion'           => 'Texto descriptivo de la meta A',

            'linea_base'            => '0',
            'objetivo'              => '10',
            'unidad_medida'         => 'Auxilios incrementados',
            'tipo_id'               => '1',
            'medida_id'             => '1',
            'oficina_id'            => '1',
        ]);

        PlanDesarrolloNivel4::create([
            'nivel3_id'             => '2',
            'numeral'               => '2',
            'nombre'                => 'Meta B',
            'descripcion'           => 'Texto descriptivo de la meta B',

            'linea_base'            => '10',
            'objetivo'              => '1',
            'unidad_medida'         => 'Casos reducidos',
            'tipo_id'               => '2',
            'medida_id'             => '1',
            'oficina_id'            => '2',
        ]);

        PlanDesarrolloNivel4::create([
            'nivel3_id'             => '3',
            'numeral'               => '3',
            'nombre'                => 'Meta C',
            'descripcion'           => 'Texto descriptivo de la meta C',

            'linea_base'            => '4',
            'objetivo'              => '4',
            'unidad_medida'         => 'Estructuras mantenidas',
            'tipo_id'               => '3',
            'medida_id'             => '1',
            'oficina_id'            => '3',
        ]);

        PlanDesarrolloNivel4::create([
            'nivel3_id'             => '4',
            'numeral'               => '4',
            'nombre'                => 'Meta D',
            'descripcion'           => 'Texto descriptivo de la meta D',

            'linea_base'            => '0',
            'objetivo'              => '100',
            'unidad_medida'         => 'Poblacion atendida',
            'tipo_id'               => '1',
            'medida_id'             => '2',
            'oficina_id'            => '1',
        ]);
    }
}
