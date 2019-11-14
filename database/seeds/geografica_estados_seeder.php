<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\GeograficaEstado;

class geografica_estados_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeograficaEstado::create([
            'nombre'    => 'Colombia',
        ]);

        GeograficaEstado::create([
            'nombre'    => 'Mexico',
        ]);

        GeograficaEstado::create([
            'nombre'    => 'Peru',
        ]);
    }
}
