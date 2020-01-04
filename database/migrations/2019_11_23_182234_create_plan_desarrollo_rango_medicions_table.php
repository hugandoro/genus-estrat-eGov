<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanDesarrolloRangoMedicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_desarrollo_rango_medicions', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('plan_desarrollo_id')->unsigned();
            $table->foreign('plan_desarrollo_id')
                    ->references('id')
                    ->on('plan_desarrollos')
                    ->onDelete('cascade');

            $table->text('nombre');
            $table->text('color_hexa');
            $table->integer('rango_inicial')->unsigned();
            $table->integer('rango_final')->unsigned();

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
        Schema::dropIfExists('plan_desarrollo_rango_medicions');
    }
}
