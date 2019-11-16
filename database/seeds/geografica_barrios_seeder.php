<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\GeograficaBarrio;

class geografica_barrios_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeograficaBarrio::create([
            'comuna_id'    	=> '1',
            'nombre'        => 'Barrio de prueba',
        ]);
    }
}
