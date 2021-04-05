<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuloMipgNivel4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulo_mipg_nivel4s', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('nivel3_id')->unsigned();
            $table->foreign('nivel3_id')
                    ->references('id')
                    ->on('modulo_mipg_nivel3s')
                    ->onDelete('restrict');

            $table->integer('numeral')->unique();
            $table->text('accion');
            $table->text('descripcion_corta');
            $table->text('descripcion_larga');

            $table->string('linea_base',15); // Cantidad inicial
            $table->string('meta',15); // Cantidad a terminar

            $table->text('objetivo'); // Valor a realizar
            $table->text('unidad_medida'); // Ejemplo metros, calles, cuadras, oficios, etc

            $table->integer('medida_id')->unsigned(); // Numero - Puntos - Porcentual
            $table->foreign('medida_id')
                    ->references('id')
                    ->on('medicion_medidas')
                    ->onDelete('restrict');
        
            $table->integer('tipo_id')->unsigned(); // Incremento - Mantenimiento - Reduccion
            $table->foreign('tipo_id')
                    ->references('id')
                    ->on('medicion_tipos')
                    ->onDelete('restrict');

            $table->integer('vigencia_id')->unsigned();
            $table->foreign('vigencia_id')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('restrict');

            $table->integer('oficina_id')->unsigned();
            $table->foreign('oficina_id')
                    ->references('id')
                    ->on('entidad_oficinas')
                    ->onDelete('restrict');

            $table->string('valor_realizado')->default('0'); // Cantidad realizada en unidades acorde al OBJETIVO
            $table->string('porcentaje_realizado')->default('0'); // Cantidad realizada en porcentaje acorde al OBJETIVO
            $table->string('rezago')->default('0'); // Cantidad en unidades faltante por realizar acorde al OBJETIVO
        
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
        Schema::dropIfExists('modulo_mipg_nivel4s');
    }
}
