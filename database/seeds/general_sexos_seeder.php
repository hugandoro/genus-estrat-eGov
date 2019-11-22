<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\GeneralSexo;

class general_sexos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSexo::create([
            'nombre'    => 'Masculino',
        ]);

        GeneralSexo::create([
            'nombre'    => 'Femenino',
        ]);

        GeneralSexo::create([
            'nombre'    => 'LGTBI',
        ]);
    }
}
