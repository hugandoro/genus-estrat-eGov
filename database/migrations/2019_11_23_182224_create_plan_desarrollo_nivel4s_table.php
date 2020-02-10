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
            $table->text('descripcion');

            $table->integer('linea_base')->unsigned();
            $table->integer('objetivo')->unsigned();
            $table->text('unidad_medida');

            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')
                    ->references('id')
                    ->on('medicion_tipos')
                    ->onDelete('cascade');

            $table->integer('medida_id')->unsigned();
            $table->foreign('medida_id')
                    ->references('id')
                    ->on('medicion_medidas')
                    ->onDelete('cascade');

            $table->integer('oficina_id')->unsigned();
            $table->foreign('oficina_id')
                    ->references('id')
                    ->on('entidad_oficinas')
                    ->onDelete('cascade');

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
