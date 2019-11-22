<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\RefDepartamentalPolitica;

class ref_departamental_politicas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefDepartamentalPolitica::create([
            'nombre'        => 'Politica DEPARTAMENTAL de prueba',
            'descripcion'   => 'Descripcion',
        ]);
    }
}
