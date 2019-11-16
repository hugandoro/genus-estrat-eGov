<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\GeograficaCorregimiento;

class geografica_corregimientos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeograficaCorregimiento::create([
            'municipio_id'    	=> '4',
            'nombre'    	    => 'Alto El Nudo',
        ]);

        GeograficaCorregimiento::create([
            'municipio_id'    	=> '4',
            'nombre'    	    => 'Las Marcadas',
        ]);
    }
}
