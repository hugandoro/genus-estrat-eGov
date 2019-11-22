<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\MedicionTipo;

class medicion_tipos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicionTipo::create([
            'nombre'    => 'Incremento',
        ]);

        MedicionTipo::create([
            'nombre'    => 'Reduccion',
        ]);

        MedicionTipo::create([
            'nombre'    => 'Mantenimiento',
        ]);

        MedicionTipo::create([
            'nombre'    => 'Mantener por debajo',
        ]);

        MedicionTipo::create([
            'nombre'    => 'Mantener por arriba',
        ]);
    }
}
