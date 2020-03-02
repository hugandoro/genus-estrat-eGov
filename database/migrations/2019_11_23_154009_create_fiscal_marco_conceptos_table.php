<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiscalMarcoConceptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiscal_marco_conceptos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');

            $table->integer('marco_id')->unsigned();
            $table->foreign('marco_id')
                    ->references('id')
                    ->on('fiscal_marcos')
                    ->onDelete('restrict');

            $table->integer('concepto_id')->unsigned();
            $table->foreign('concepto_id')
                    ->references('id')
                    ->on('contable_conceptos')
                    ->onDelete('restrict');

            $table->integer('vigencia_id_1')->unsigned();
            $table->foreign('vigencia_id_1')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('restrict');

            $table->bigInteger('valor_1')->unsigned();

            $table->integer('vigencia_id_2')->unsigned();
            $table->foreign('vigencia_id_2')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('restrict');

            $table->bigInteger('valor_2')->unsigned();

            $table->integer('vigencia_id_3')->unsigned();
            $table->foreign('vigencia_id_3')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('restrict');

            $table->bigInteger('valor_3')->unsigned();

            $table->integer('vigencia_id_4')->unsigned();
            $table->foreign('vigencia_id_4')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('restrict');

            $table->bigInteger('valor_4')->unsigned();

            $table->integer('vigencia_id_5')->unsigned();
            $table->foreign('vigencia_id_5')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('restrict');

            $table->bigInteger('valor_5')->unsigned();

            $table->integer('vigencia_id_6')->unsigned();
            $table->foreign('vigencia_id_6')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('restrict');

            $table->bigInteger('valor_6')->unsigned();

            $table->integer('vigencia_id_7')->unsigned();
            $table->foreign('vigencia_id_7')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('restrict');

            $table->bigInteger('valor_7')->unsigned();

            $table->integer('vigencia_id_8')->unsigned();
            $table->foreign('vigencia_id_8')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('restrict');

            $table->bigInteger('valor_8')->unsigned();

            $table->integer('vigencia_id_9')->unsigned();
            $table->foreign('vigencia_id_9')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('restrict');

            $table->bigInteger('valor_9')->unsigned();

            $table->integer('vigencia_id_10')->unsigned();
            $table->foreign('vigencia_id_10')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('restrict');

            $table->bigInteger('valor_10')->unsigned();
               
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
        Schema::dropIfExists('fiscal_marco_conceptos');
    }
}
