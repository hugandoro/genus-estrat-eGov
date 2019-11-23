<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\FiscalMarcoConcepto;

class fiscal_marco_conceptos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FiscalMarcoConcepto::create([
            'marco_id'      => '1',
            'concepto_id'   => '1',
            'vigencia_id_1' => '1',
            'valor_1'       => '1000',
            'vigencia_id_2' => '2',
            'valor_2'       => '1000',
            'vigencia_id_3' => '3',
            'valor_3'       => '1000',
            'vigencia_id_4' => '4',
            'valor_4'       => '1000',
            'vigencia_id_5' => '5',
            'valor_5'       => '1000',
            'vigencia_id_6' => '6',
            'valor_6'       => '1000',
            'vigencia_id_7' => '7',
            'valor_7'       => '1000',
            'vigencia_id_8' => '8',
            'valor_8'       => '1000',
            'vigencia_id_9' => '9',
            'valor_9'       => '1000',
            'vigencia_id_10' => '10',
            'valor_10'       => '1000',
        ]);
    }
}
