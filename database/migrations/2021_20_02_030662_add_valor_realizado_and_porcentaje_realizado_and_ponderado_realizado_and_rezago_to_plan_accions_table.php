<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValorRealizadoAndPorcentajeRealizadoAndPonderadoRealizadoAndRezagoToPlanAccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_accions', function (Blueprint $table) {
            $table->string('valor_realizado')->default('0'); // Cantidad realizada en unidades acorde al objetivo del KPI
            $table->string('porcentaje_realizado')->default('0'); // Cantidad realizada en porcentaje acorde al objetivo del KPI
            $table->string('ponderado_realizado')->default('0'); // Equivalente en ponderado realizado acorde al ponderado del KPI
            $table->string('rezago')->default('0'); // Cantidad en unidades faltante por realizar acorde al objetivo del KPI
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
