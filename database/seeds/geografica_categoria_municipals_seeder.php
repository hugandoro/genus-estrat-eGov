<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\GeograficaCategoriaMunicipal;

class geografica_categoria_municipals_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeograficaCategoriaMunicipal::create([
            'estado_id'     => '1',
            'nombre'        => 'Categoria especial',
            'poblacion_min' => '500001',
            'poblacion_max' => '999999999999',
            'icld_min'      =>  '400001', //Salarios minimos legales vigentes
            'icld_max'      =>  '999999999999',
        ]);

        GeograficaCategoriaMunicipal::create([
            'estado_id'     => '1',
            'nombre'        => 'Primera categoria',
            'poblacion_min' => '100001',
            'poblacion_max' => '500000',
            'icld_min'      =>  '100001',
            'icld_max'      =>  '400000',
        ]);

        GeograficaCategoriaMunicipal::create([
            'estado_id'     => '1',
            'nombre'        => 'Segunda categoria',
            'poblacion_min' => '50001',
            'poblacion_max' => '100000',
            'icld_min'      =>  '50001',
            'icld_max'      =>  '100000',
        ]);

        GeograficaCategoriaMunicipal::create([
            'estado_id'     => '1',
            'nombre'        => 'Tercera categoria',
            'poblacion_min' => '30001',
            'poblacion_max' => '50000',
            'icld_min'      =>  '30001',
            'icld_max'      =>  '50000',
        ]);

        GeograficaCategoriaMunicipal::create([
            'estado_id'     => '1',
            'nombre'        => 'Cuarta categoria',
            'poblacion_min' => '20001',
            'poblacion_max' => '30000',
            'icld_min'      =>  '25001',
            'icld_max'      =>  '30000',
        ]);

        GeograficaCategoriaMunicipal::create([
            'estado_id'     => '1',
            'nombre'        => 'Quinta categoria',
            'poblacion_min' => '10001',
            'poblacion_max' => '20000',
            'icld_min'      =>  '15001',
            'icld_max'      =>  '25000',
        ]);

        GeograficaCategoriaMunicipal::create([
            'estado_id'     => '1',
            'nombre'        => 'Sexta categoria',
            'poblacion_min' => '0',
            'poblacion_max' => '10000',
            'icld_min'      =>  '0',
            'icld_max'      =>  '15000',
        ]);
    }
}
