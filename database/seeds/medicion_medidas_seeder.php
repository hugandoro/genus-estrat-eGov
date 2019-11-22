<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\MedicionMedida;

class medicion_medidas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicionMedida::create([
            'nombre'    => 'Numero',
        ]);

        MedicionMedida::create([
            'nombre'    => 'Porcentaje',
        ]);
    }
}
