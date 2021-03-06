<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\GeneralVigencia;

class general_vigencias_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralVigencia::create([
            'nombre'    => 'No Disponible',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2010',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2011',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2012',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2013',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2014',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2015',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2016',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2017',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2018',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2019',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2020',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2021',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2022',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2023',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2024',
        ]);

        GeneralVigencia::create([
            'nombre'    => '2025',
        ]);

    }
}
