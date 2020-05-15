<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\MedicionUnidadMedida;

class medicion_unidad_medidas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicionUnidadMedida::create([
            'nombre'    => 'No definida',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Kilometros',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Metros',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Centimetros',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Personas',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Animales',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Casas',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Fincas',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Empresas',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Lotes',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Rios',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Proyectos',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Documentos tecnicos',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Vacunas',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Escuelas',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Colegios',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Universidades',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Profesores / Docentes',
        ]);

        MedicionUnidadMedida::create([
            'nombre'    => 'Estudiantes',
        ]);
    }
}
