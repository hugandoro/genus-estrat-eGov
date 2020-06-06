<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdsNivel4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ods_nivel4s', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            //$table->increments('id');

            $table->integer('nivel4_id')->unsigned();
            $table->foreign('nivel4_id')
                    ->references('id')
                    ->on('plan_desarrollo_nivel4s')
                    ->onDelete('restrict');

            $table->integer('ods_id')->unsigned();
            $table->foreign('ods_id')
                    ->references('id')
                    ->on('ref_ods_objetivos')
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
        Schema::dropIfExists('ods_nivel4s');
    }
}
