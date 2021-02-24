<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValorRealizadoAndPorcentajeRealizadoAndRezagoToPlanIndicativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_indicativos', function (Blueprint $table) {
            $table->string('valor_realizado')->default('0'); //Cantidad realizada en unidades acorde al objetivo del Plan indicativo para la vigencia
            $table->string('porcentaje_realizado')->default('0'); //Cantidad realizada en porcentaje acorde al objetivo del Plan indicativo para la vigencia
            $table->string('rezago')->default('0'); // Cantidad en unidades faltante por realizar acorde al objetivo del Plan indicativo para la vigencia
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
