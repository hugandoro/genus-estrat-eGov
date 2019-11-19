<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\EntidadTipo;

class entidad_tipos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntidadTipo::create([
            'nombre'    => 'Presidencia',
        ]);

        EntidadTipo::create([
            'nombre'    => 'Gobernacion',
        ]);

        EntidadTipo::create([
            'nombre'    => 'Alcaldia',
        ]);

        EntidadTipo::create([
            'nombre'    => 'Entidad',
        ]);

        EntidadTipo::create([
            'nombre'    => 'Instituto',
        ]);
    }
}
