<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\GeograficaVereda;

class geografica_veredas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeograficaVereda::create([
            'corregimiento_id'  => '1',
            'nombre'    	    => 'Vereda de prueba',
        ]);
    }
}
