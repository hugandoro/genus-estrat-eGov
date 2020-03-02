<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeograficaMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geografica_municipios', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')
                    ->references('id')
                    ->on('geografica_departamentos')
                    ->onDelete('restrict');

            $table->integer('categoria_municipal_id')->unsigned();
            $table->foreign('categoria_municipal_id')
                    ->references('id')
                    ->on('geografica_categoria_municipals')
                    ->onDelete('restrict');
                    
            $table->string('nombre',150)->unique();
            $table->text('descripcion');
            $table->integer('altitud_msnm');
            $table->integer('temperatura_c');
            $table->integer('area_km2');
            $table->integer('poblacion');      
            $table->integer('fundacion');
            $table->string('gentilicio',100);
            $table->text('bandera');
            $table->text('escudo');
            $table->boolean('capital')->default(false);
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
        Schema::dropIfExists('geografica_municipios');
    }
}
