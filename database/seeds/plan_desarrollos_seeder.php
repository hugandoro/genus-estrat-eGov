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
            'nombre_nivel1'         => 'Objetivo Estrategico',
            'nombre_nivel2'         => 'Objetivo Sectorial',
            'nombre_nivel3'         => 'Objetivo Programatico',
            'nombre_nivel4'         => 'Meta Producto',
        ]);
    }
}
