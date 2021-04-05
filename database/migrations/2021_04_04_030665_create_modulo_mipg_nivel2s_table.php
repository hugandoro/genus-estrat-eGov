<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuloMipgNivel2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulo_mipg_nivel2s', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('nivel1_id')->unsigned();
            $table->foreign('nivel1_id')
                    ->references('id')
                    ->on('modulo_mipg_nivel1s')
                    ->onDelete('restrict');

            $table->integer('numeral')->unique();
            $table->text('politica');
            $table->text('descripcion_corta');
            $table->text('descripcion_larga');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulo_mipg_nivel2s');
    }
}
