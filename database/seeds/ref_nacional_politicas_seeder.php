<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\RefNacionalPolitica;

class ref_nacional_politicas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefNacionalPolitica::create([
            'nombre'        => 'Politica NACIONAL de prueba',
            'descripcion'   => 'Descripcion',
        ]);
    }
}
