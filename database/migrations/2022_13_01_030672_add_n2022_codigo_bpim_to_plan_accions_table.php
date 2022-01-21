<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddN2022CodigoBpimToPlanAccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_accions', function (Blueprint $table) {
            $table->string('n2022_codigo_bpim')->default(''); // Codigo Banco de proyectos Bpim asignados a la accion
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