<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanDesarrollosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_desarrollos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');

            $table->integer('administracion_id')->unsigned();
            $table->foreign('administracion_id')
                    ->references('id')
                    ->on('administracions')
                    ->onDelete('cascade');

            $table->integer('vigencia_id_inicial')->unsigned();
            $table->foreign('vigencia_id_inicial')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('cascade');

            $table->integer('vigencia_id_final')->unsigned();
            $table->foreign('vigencia_id_final')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('cascade');
            
            $table->text('nombre_nivel1');
            $table->text('nombre_nivel2');
            $table->text('nombre_nivel3');
            $table->text('nombre_nivel4');

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
        Schema::dropIfExists('plan_desarrollos');
    }
}
