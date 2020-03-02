<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidads', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('orden_id')->unsigned();
            $table->foreign('orden_id')
                    ->references('id')
                    ->on('entidad_ordens')
                    ->onDelete('restrict');

            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')
                    ->references('id')
                    ->on('entidad_tipos')
                    ->onDelete('restrict');

            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')
                    ->references('id')
                    ->on('entidad_categorias')
                    ->onDelete('restrict');

            $table->integer('sector_id')->unsigned();
            $table->foreign('sector_id')
                    ->references('id')
                    ->on('entidad_sectors')
                    ->onDelete('restrict');

            $table->string('nombre',150)->unique();
            $table->string('direccion',150)->unique();
            $table->integer('telefono')->unique();
            $table->string('email',150)->unique();                

            $table->integer('municipio_id')->unsigned();
            $table->foreign('municipio_id')
                    ->references('id')
                    ->on('geografica_municipios')
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
        Schema::dropIfExists('entidads');
    }
}
