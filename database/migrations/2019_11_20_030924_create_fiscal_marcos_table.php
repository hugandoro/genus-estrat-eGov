<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiscalMarcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiscal_marcos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');

            $table->integer('entidad_id')->unsigned();
            $table->foreign('entidad_id')
                    ->references('id')
                    ->on('entidads')
                    ->onDelete('restrict');

            $table->integer('vigencia_id_inicial')->unsigned();
            $table->foreign('vigencia_id_inicial')
                    ->references('id')
                    ->on('general_vigencias')
                    ->onDelete('restrict');

            $table->integer('vigencia_id_final')->unsigned();
            $table->foreign('vigencia_id_final')
                    ->references('id')
                    ->on('general_vigencias')
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
        Schema::dropIfExists('fiscal_marcos');
    }
}
