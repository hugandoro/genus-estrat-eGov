<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuloMipgNivel3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulo_mipg_nivel3s', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('nivel2_id')->unsigned();
            $table->foreign('nivel2_id')
                    ->references('id')
                    ->on('modulo_mipg_nivel2s')
                    ->onDelete('restrict');

            $table->integer('numeral')->unique();
            $table->text('categoria_audodiagnistico');
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
        Schema::dropIfExists('modulo_mipg_nivel3s');
    }
}
