<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\GeneralPoblacion;

class general_poblacions_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralPoblacion::create([
            'nombre'    => 'Primera infancia',
        ]);

        GeneralPoblacion::create([
            'nombre'    => 'Adolescentes',
        ]);

        GeneralPoblacion::create([
            'nombre'    => 'Jovenes',
        ]);

        GeneralPoblacion::create([
            'nombre'    => 'Adultos',
        ]);

        GeneralPoblacion::create([
            'nombre'    => 'Adultos mayores',
        ]);

        GeneralPoblacion::create([
            'nombre'    => 'Comerciantes',
        ]);

        GeneralPoblacion::create([
            'nombre'    => 'Estudiantes',
        ]);

        GeneralPoblacion::create([
            'nombre'    => 'Madres cabeza de hogar',
        ]);

        GeneralPoblacion::create([
            'nombre'    => 'Desplazados',
        ]);

        GeneralPoblacion::create([
            'nombre'    => 'Reinsertados',
        ]);

        GeneralPoblacion::create([
            'nombre'    => 'Retornados',
        ]);

        GeneralPoblacion::create([
            'nombre'    => 'Inmigrantes',
        ]);

        GeneralPoblacion::create([
            'nombre'    => 'Docentes',
        ]);

        GeneralPoblacion::create([
            'nombre'    => 'Movilidad reducida',
        ]);

        GeneralPoblacion::create([
            'nombre'    => 'Animales',
        ]);
    }
}
