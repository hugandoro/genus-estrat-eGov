<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\ContableConcepto;

class contable_conceptos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContableConcepto::create([
            'nombre'    => 'Vehiculos',
        ]);

        ContableConcepto::create([
            'nombre'    => 'Impuestos de alumbrado',
        ]);

        ContableConcepto::create([
            'nombre'    => 'Impuestos de industria y comercio',
        ]);

        ContableConcepto::create([
            'nombre'    => 'Impuesto de vallas',
        ]);
    }
}
