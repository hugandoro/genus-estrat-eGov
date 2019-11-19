<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidad_oficinas', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('entidad_id')->unsigned();
            $table->foreign('entidad_id')
                    ->references('id')
                    ->on('entidads')
                    ->onDelete('cascade');

            $table->integer('tipo_oficina_id')->unsigned();
            $table->foreign('tipo_oficina_id')
                    ->references('id')
                    ->on('entidad_tipo_oficinas')
                    ->onDelete('cascade');

            $table->string('nombre',150)->unique();

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
        Schema::dropIfExists('entidad_oficinas');
    }
}
