<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\GeneralEstado;

class general_estados_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralEstado::create([
            'nombre'    => 'Activo',
        ]);

        GeneralEstado::create([
            'nombre'    => 'Inactivo',
        ]);

        GeneralEstado::create([
            'nombre'    => 'Suspendido',
        ]);
    }
}
