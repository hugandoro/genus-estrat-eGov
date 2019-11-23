<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministracionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administracions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->text('nombre_representante');

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

            $table->text('slogan');
            
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
        Schema::dropIfExists('administracions');
    }
}
