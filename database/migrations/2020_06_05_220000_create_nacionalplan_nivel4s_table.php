<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNacionalplanNivel4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nacionalplan_nivel4s', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            //$table->increments('id');

            $table->integer('nivel4_id')->unsigned();
            $table->foreign('nivel4_id')
                    ->references('id')
                    ->on('plan_desarrollo_nivel4s')
                    ->onDelete('restrict');

            $table->integer('nacionalplan_id')->unsigned();
            $table->foreign('nacionalplan_id')
                    ->references('id')
                    ->on('ref_nacional_plans')
                    ->onDelete('restrict');

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nacionalplan_nivel4s');
    }
}
