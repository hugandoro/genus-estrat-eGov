<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicionIndicadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicion_indicadors', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('nombre',150);

            $table->integer('unidad_medida_id')->unsigned();
            $table->foreign('unidad_medida_id')
                    ->references('id')
                    ->on('medicion_unidad_medidas')
                    ->onDelete('restrict');

            $table->string('linea_base',15);

            $table->integer('vigencia_id_base')->unsigned();
            $table->foreign('vigencia_id_base')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('restrict');

            $table->string('meta',15);
            $table->string('objetivo',15);

            $table->integer('medida_id')->unsigned();
            $table->foreign('medida_id')
                    ->references('id')
                    ->on('medicion_medidas')
                    ->onDelete('restrict');

            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')
                    ->references('id')
                    ->on('medicion_tipos')
                    ->onDelete('restrict');

            $table->integer('nivel4_id')->unsigned();
            $table->foreign('nivel4_id')
                    ->references('id')
                    ->on('plan_desarrollo_nivel4s')
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
        Schema::dropIfExists('medicion_indicadors');
    }
}
