<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\GeograficaComuna;

class geografica_comunas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeograficaComuna::create([
            'municipio_id'    	=> '4',
            'nombre'    	    => 'Comuna 1',
        ]);

        GeograficaComuna::create([
            'municipio_id'    	=> '4',
            'nombre'    	    => 'Comuna 2',
        ]);

        GeograficaComuna::create([
            'municipio_id'    	=> '4',
            'nombre'    	    => 'Comuna 3',
        ]);

        GeograficaComuna::create([
            'municipio_id'    	=> '4',
            'nombre'    	    => 'Comuna 4',
        ]);

        GeograficaComuna::create([
            'municipio_id'    	=> '4',
            'nombre'    	    => 'Comuna 5',
        ]);

        GeograficaComuna::create([
            'municipio_id'    	=> '4',
            'nombre'    	    => 'Comuna 6',
        ]);

        GeograficaComuna::create([
            'municipio_id'    	=> '4',
            'nombre'    	    => 'Comuna 7',
        ]);

        GeograficaComuna::create([
            'municipio_id'    	=> '4',
            'nombre'    	    => 'Comuna 8',
        ]);

        GeograficaComuna::create([
            'municipio_id'    	=> '4',
            'nombre'    	    => 'Comuna 9',
        ]);

        GeograficaComuna::create([
            'municipio_id'    	=> '4',
            'nombre'    	    => 'Comuna 10',
        ]);
    }
}
