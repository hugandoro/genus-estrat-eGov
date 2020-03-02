<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefNacionalPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_nacional_plans', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('codigo',150)->unique();
            $table->string('nombre',150);
            $table->text('descripcion');
            $table->integer('estado_id')->unsigned();

            $table->foreign('estado_id')
                    ->references('id')
                    ->on('geografica_estados')
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
        Schema::dropIfExists('ref_nacional_plans');
    }
}
