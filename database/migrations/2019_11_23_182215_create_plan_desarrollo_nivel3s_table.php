<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanDesarrolloNivel3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_desarrollo_nivel3s', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('nivel2_id')->unsigned();
            $table->foreign('nivel2_id')
                    ->references('id')
                    ->on('plan_desarrollo_nivel2s')
                    ->onDelete('restrict');

            $table->integer('numeral');
            $table->text('nombre');
            $table->text('objetivo');

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
        Schema::dropIfExists('plan_desarrollo_nivel3s');
    }
}
