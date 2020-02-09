<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\PlanDesarrollo;

class plan_desarrollos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlanDesarrollo::create([
            'administracion_id'     => '1',
            'nombre_nivel1'         => 'Linea Estrategica',
            'nombre_nivel2'         => 'Programa',
            'nombre_nivel3'         => 'Proyecto',
            'nombre_nivel4'         => 'Actividad',
        ]);
    }
}
