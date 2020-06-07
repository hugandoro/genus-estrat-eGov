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
            'nombre'        => 'Politica pública municipal de Equidad de Genero',
            'descripcion'   => 'Equidad de genero',
            'municipio_id'  => '4',
        ]);

        RefMunicipalPolitica::create([
            'nombre'        => 'Politica pública municipal de Discapacidad',
            'descripcion'   => 'Discapacidad',
            'municipio_id'  => '4',
        ]);

        RefMunicipalPolitica::create([
            'nombre'        => 'Politica pública municipal de Juventudes',
            'descripcion'   => 'Juventudes',
            'municipio_id'  => '4',
        ]);

        RefMunicipalPolitica::create([
            'nombre'        => 'Politica pública municipal de Migrados',
            'descripcion'   => 'Migrados',
            'municipio_id'  => '4',
        ]);

        RefMunicipalPolitica::create([
            'nombre'        => 'Politica pública municipal del Adulto Mayor',
            'descripcion'   => 'Adulto Mayor',
            'municipio_id'  => '4',
        ]);

        RefMunicipalPolitica::create([
            'nombre'        => 'Politica pública municipal de Primera Infancia, Infancia y Adolescencia',
            'descripcion'   => 'Primera Infancia, Infancia y Adolescencia',
            'municipio_id'  => '4',
        ]);
    }
}
