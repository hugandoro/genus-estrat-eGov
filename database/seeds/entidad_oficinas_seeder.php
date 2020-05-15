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
            'nombre'            => 'Prensa y Comunicaciones',
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
            'nombre'            => 'Gobierno Municipal',
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
            'nombre'            => 'Hacienda y Finanzas',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Transito y Movilidad',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Obras e Infraestructura',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Desarrollo Social y Politico',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Salud y Seguridad Social',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Planeacion Municipal',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Desarrollo Economico y Competitividad',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '4',
            'nombre'            => 'Tecnologias de la informacion TIC',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '4',
            'nombre'            => 'Gestion del Riesgo',
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
            'nombre'            => 'Instituto de Desarrollo Municipal',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '7',
            'nombre'            => 'Serviciudad',
            'responsable'       => 'Sin titular'
        ]);

        EntidadOficina::create([
            'entidad_id'        => '1',
            'tipo_oficina_id'   => '3',
            'nombre'            => 'Desarollo Agropecuario y Gestion Ambiental',
            'responsable'       => 'Sin titular'
        ]);
    }
}
