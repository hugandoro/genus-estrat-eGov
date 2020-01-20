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
            'nombre_representante'  => 'Diego Ramos',
            'vigencia_id_inicial'   => '5',
            'vigencia_id_final'     => '9',
            'slogan'                => 'Dosquebradas Empresa de Todos',
            'logo'                  => 'logo_miniatura_administracion.png',
        ]);
    }
}
