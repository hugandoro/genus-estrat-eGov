<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\ContableFuenteRecurso;

class contable_fuente_recursos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContableFuenteRecurso::create([
            'nombre'    => 'SGP',
        ]);

        ContableFuenteRecurso::create([
            'nombre'    => 'RP',
        ]);

        ContableFuenteRecurso::create([
            'nombre'    => 'Cofinanciacion',
        ]);

        ContableFuenteRecurso::create([
            'nombre'    => 'SGR',
        ]);

        ContableFuenteRecurso::create([
            'nombre'    => 'Creditos',
        ]);

        ContableFuenteRecurso::create([
            'nombre'    => 'Otros',
        ]);
    }
}
