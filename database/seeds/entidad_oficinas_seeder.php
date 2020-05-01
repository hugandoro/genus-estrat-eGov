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
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '1',
            'nombre'            => 'Privada',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '1',
            'nombre'            => 'Prensa',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Asuntos Administrativos',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Juridica',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Gobierno',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Cultura, Recreacion y Deportes',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Educacion',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Hacienda',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Transito',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Obras Publicas',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Social',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Salud',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Planeacion',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Economico y Competitividad',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '4',
            'nombre'            => 'TIC',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '4',
            'nombre'            => 'Diger',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '7',
            'nombre'            => 'Bomberos',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '7',
            'nombre'            => 'IDM',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '4',
            'nombre'            => 'Serviciudad',
            'responsable'       => 'Sin titular'
        ]);
    }
}
