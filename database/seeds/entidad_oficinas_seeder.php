<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\EntidadOficina;

class entidad_oficinas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '5',
            'nombre'            => 'Despacho Alcalde',
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '1',
            'nombre'            => 'Asesoria Juridica',
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Asuntos Administrativos',
        ]);
    }
}