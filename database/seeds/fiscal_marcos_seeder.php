<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\FiscalMarco;

class fiscal_marcos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FiscalMarco::create([
            'entidad_id'            => '1',
            'vigencia_id_inicial'   => '1',
            'vigencia_id_final'     => '10',
        ]);
    }
}
