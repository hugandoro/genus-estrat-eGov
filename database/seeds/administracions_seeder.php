<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Administracion;

class administracions_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administracion::create([
            'nombre_representante'  => 'Jorge Diego Ramos Castaño',
            'vigencia_id_inicial'   => '12',
            'vigencia_id_final'     => '15',
            'slogan'                => 'Dosquebradas Empresa de Todos | Planeada, ordenada y dinamica',
            'logo'                  => 'logo_miniatura_administracion.png',
        ]);
    }
}
