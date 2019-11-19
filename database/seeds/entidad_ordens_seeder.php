<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\EntidadOrden;

class entidad_ordens_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntidadOrden::create([
            'nombre'    => 'Nacional',
        ]);

        EntidadOrden::create([
            'nombre'    => 'Territorial',
        ]);
    }
}
