<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\EntidadTipoOficina;

class entidad_tipo_oficinas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntidadTipoOficina::create([
            'nombre'    => 'Asesoria',
        ]);

        EntidadTipoOficina::create([
            'nombre'    => 'Ministerio',
        ]);

        EntidadTipoOficina::create([
            'nombre'    => 'Secretaria',
        ]);

        EntidadTipoOficina::create([
            'nombre'    => 'Direccion Operativa',
        ]);

        EntidadTipoOficina::create([
            'nombre'    => 'Oficina',
        ]);

        EntidadTipoOficina::create([
            'nombre'    => 'Area',
        ]);

        EntidadTipoOficina::create([
            'nombre'    => 'Entidad Descentralizada',
        ]);
    }
}
