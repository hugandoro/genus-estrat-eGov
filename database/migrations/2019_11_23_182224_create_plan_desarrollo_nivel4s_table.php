<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanDesarrolloNivel4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_desarrollo_nivel4s', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('nivel3_id')->unsigned();
            $table->foreign('nivel3_id')
                    ->references('id')
                    ->on('plan_desarrollo_nivel3s')
                    ->onDelete('restrict');

            $table->integer('numeral')->unique();
            $table->text('nombre');
            $table->text('objetivo');

            $table->integer('oficina_id')->unsigned();
            $table->foreign('oficina_id')
                    ->references('id')
                    ->on('entidad_oficinas')
                    ->onDelete('restrict');

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
        Schema::dropIfExists('plan_desarrollo_nivel4s');
    }
}
