<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\RefMunicipalPolitica;

class ref_municipal_politicas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefMunicipalPolitica::create([
            'nombre'        => 'Politica MUNICIPAL de prueba',
            'descripcion'   => 'Descripcion',
            'municipio_id'  => '4',
        ]);
    }
}
