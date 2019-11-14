<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeograficaCategoriaMunicipalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geografica_categoria_municipals', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('estado_id')->unsigned();

            $table->foreign('estado_id')
                    ->references('id')
                    ->on('geografica_estados')
                    ->onDelete('cascade');
                    
            $table->string('nombre',150)->unique();
            $table->bigInteger('poblacion_min');
            $table->bigInteger('poblacion_max');
            $table->bigInteger('icld_min');            //ICLD Ingresos corrientes de libre destinacion
            $table->bigInteger('icld_max');
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
        Schema::dropIfExists('geografica_categoria_municipals');
    }
}
