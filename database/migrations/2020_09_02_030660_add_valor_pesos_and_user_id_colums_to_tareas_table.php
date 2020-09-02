<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValorPesosAndUserIdColumsToTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tareas', function (Blueprint $table) {
            $table->string('valor_fuente1')->default('0');

            $table->integer('fuente1_id')->unsigned ()->default('0');
            $table->foreign('fuente1_id')
                    ->references('id')
                    ->on('general_fuentes')
                    ->onDelete('restrict');

            $table->string('valor_fuente2')->default('0');

            $table->integer('fuente2_id')->unsigned ()->default('0');
            $table->foreign('fuente2_id')
                    ->references('id')
                    ->on('general_fuentes')
                    ->onDelete('restrict');

            $table->string('valor_fuente3')->default('0');

            $table->integer('fuente3_id')->unsigned ()->default('0');
            $table->foreign('fuente3_id')
                    ->references('id')
                    ->on('general_fuentes')
                    ->onDelete('restrict');

            $table->integer('user_id')->unsigned ()->default('1');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
