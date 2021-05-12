<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFechaInicioAndFechaFinToModuloMipgNivel4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modulo_mipg_nivel4s', function (Blueprint $table) {
            $table->date('fecha_inicio')->default('2021-01-01');
            $table->date('fecha_fin')->default('2021-12-31');
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
