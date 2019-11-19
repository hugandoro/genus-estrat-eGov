<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\EntidadCategoria;

class entidad_categorias_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntidadCategoria::create([
            'nombre'    => 'Economia',
        ]);

        EntidadCategoria::create([
            'nombre'    => 'Movilidad',
        ]);

        EntidadCategoria::create([
            'nombre'    => 'Medio Ambiente',
        ]);

        EntidadCategoria::create([
            'nombre'    => 'Calidad de Vida',
        ]);

        EntidadCategoria::create([
            'nombre'    => 'Ciudadania Inteligente',
        ]);

        EntidadCategoria::create([
            'nombre'    => 'Gobierno Inteligente',
        ]);
    }
}
