<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\EntidadSector;

class entidad_sectors_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntidadSector::create([
            'nombre'    => 'Gobierno',
        ]);

        EntidadSector::create([
            'nombre'    => 'Educacion',
        ]);

        EntidadSector::create([
            'nombre'    => 'Movilidad',
        ]);

        EntidadSector::create([
            'nombre'    => 'Salud',
        ]);

        EntidadSector::create([
            'nombre'    => 'Cultura',
        ]);

        EntidadSector::create([
            'nombre'    => 'Ambiental',
        ]);

        EntidadSector::create([
            'nombre'    => 'Infraestructura ',
        ]);

        EntidadSector::create([
            'nombre'    => 'Seguridad',
        ]);

        EntidadSector::create([
            'nombre'    => 'Planeacion',
        ]);

        EntidadSector::create([
            'nombre'    => 'Economico',
        ]);
    }
}
