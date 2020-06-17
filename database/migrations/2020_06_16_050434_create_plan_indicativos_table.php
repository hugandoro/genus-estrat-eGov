<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanIndicativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_indicativos', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('valor',10);

            $table->integer('indicador_id')->unsigned();
            $table->foreign('indicador_id')
                    ->references('id')
                    ->on('medicion_indicadors')
                    ->onDelete('restrict');

            $table->integer('vigencia_id')->unsigned();
            $table->foreign('vigencia_id')
                    ->references('id')
                    ->on('general_vigencias')
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
        Schema::dropIfExists('plan_indicativos');
    }
}
