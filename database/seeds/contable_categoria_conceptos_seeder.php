<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\ContableCategoriaConcepto;

class contable_categoria_conceptos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContableCategoriaConcepto::create([
            'nombre'    => 'Ingresos',
        ]);

        ContableCategoriaConcepto::create([
            'nombre'    => 'Gastos',
        ]);

        ContableCategoriaConcepto::create([
            'nombre'    => 'Patrimonio',
        ]);
    }
}
