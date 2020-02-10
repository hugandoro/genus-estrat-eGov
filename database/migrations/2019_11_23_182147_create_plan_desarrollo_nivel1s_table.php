<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanDesarrolloNivel1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_desarrollo_nivel1s', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('plan_desarrollo_id')->unsigned();
            $table->foreign('plan_desarrollo_id')
                    ->references('id')
                    ->on('plan_desarrollos')
                    ->onDelete('restrict');

            $table->integer('numeral')->unique();
            $table->text('nombre');
            $table->text('descripcion');

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
        Schema::dropIfExists('plan_desarrollo_nivel1s');
    }
}
