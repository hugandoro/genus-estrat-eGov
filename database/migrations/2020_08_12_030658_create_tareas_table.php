<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');

            $table->date('fecha_realizacion');
            $table->text('descripcion');

            $table->integer('accion_id')->unsigned();
            $table->foreign('accion_id')
                    ->references('id')
                    ->on('plan_accions')
                    ->onDelete('restrict');

            $table->integer('zona_id')->unsigned();
            $table->foreign('zona_id')
                    ->references('id')
                    ->on('general_zonas')
                    ->onDelete('restrict');

            $table->integer('comuna_id')->unsigned();
            $table->foreign('comuna_id')
                    ->references('id')
                    ->on('geografica_comunas')
                    ->onDelete('restrict');

            $table->integer('corregimiento_id')->unsigned();
            $table->foreign('corregimiento_id')
                    ->references('id')
                    ->on('geografica_corregimientos')
                    ->onDelete('restrict');

            $table->integer('poblacion_id')->unsigned();
            $table->foreign('poblacion_id')
                    ->references('id')
                    ->on('general_poblacions')
                    ->onDelete('restrict');

            $table->integer('sexo_id')->unsigned();
            $table->foreign('sexo_id')
                    ->references('id')
                    ->on('general_sexos')
                    ->onDelete('restrict');

            $table->text('poblacion');
            $table->text('impacto_kpi');
            $table->string('evidencia_pdf');

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
        Schema::dropIfExists('tareas');
    }
}
