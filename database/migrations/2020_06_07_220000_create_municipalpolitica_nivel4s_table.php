<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipalpoliticaNivel4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalpolitica_nivel4s', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            //$table->increments('id');

            $table->integer('nivel4_id')->unsigned();
            $table->foreign('nivel4_id')
                    ->references('id')
                    ->on('plan_desarrollo_nivel4s')
                    ->onDelete('restrict');

            $table->integer('municipalpolitica_id')->unsigned();
            $table->foreign('municipalpolitica_id')
                    ->references('id')
                    ->on('ref_municipal_politicas')
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
        Schema::dropIfExists('municipalpolitica_nivel4s');
    }
}
