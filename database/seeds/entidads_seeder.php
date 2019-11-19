<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Entidad;

class entidads_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entidad::create([
            'orden_id'    	=> '2',
            'tipo_id'    	=> '3',
            'categoria_id'  => '6',
            'sector_id'    	=> '1',
            'nombre'        => 'Alcaldia de Dosquebradas',
            'direccion'     => 'Centro Administrativo CAM',
            'telefono'      => '3116566',
            'email'         => 'contacto@dosquebradas.gov.co',
            'municipio_id'  => '4',
        ]);
    }
}
