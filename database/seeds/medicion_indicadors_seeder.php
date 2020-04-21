<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\MedicionIndicador;

class medicion_indicadors_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicionIndicador::create([
            'nombre'             => 'Indicador por defecto',
            'unidad_medida_id'   => '1',
            'linea_base'         => '0',
            'vigencia_id_base'   => '4',
            'meta'               => '4',
            'objetivo'           => '4',
            'medida_id'          => '1',
            'tipo_id'            => '1',
            'nivel4_id'          => '1',
        ]);

        MedicionIndicador::create([
            'nombre'             => 'Indicador por defecto',
            'unidad_medida_id'   => '1',
            'linea_base'         => '0',
            'vigencia_id_base'   => '4',
            'meta'               => '4',
            'objetivo'           => '4',
            'medida_id'          => '1',
            'tipo_id'            => '1',
            'nivel4_id'          => '2',
        ]);

        MedicionIndicador::create([
            'nombre'             => 'Indicador por defecto',
            'unidad_medida_id'   => '1',
            'linea_base'         => '0',
            'vigencia_id_base'   => '4',
            'meta'               => '4',
            'objetivo'           => '4',
            'medida_id'          => '1',
            'tipo_id'            => '1',
            'nivel4_id'          => '3',
        ]);

        MedicionIndicador::create([
            'nombre'             => 'Indicador por defecto',
            'unidad_medida_id'   => '1',
            'linea_base'         => '0',
            'vigencia_id_base'   => '4',
            'meta'               => '4',
            'objetivo'           => '4',
            'medida_id'          => '1',
            'tipo_id'            => '1',
            'nivel4_id'          => '4',
        ]);
    }
}
