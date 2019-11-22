<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\GeneralZona;

class general_zonas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralZona::create([
            'nombre'    => 'Urbana',
        ]);

        GeneralZona::create([
            'nombre'    => 'Rural',
        ]);

        GeneralZona::create([
            'nombre'    => 'Mixta',
        ]);
    }
}
