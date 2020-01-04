<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanDesarrollo extends Model
{
    protected $table = 'plan_desarrollos';
    protected $fillable = ['administracion_id','vigencia_id_inicial','vigencia_id_final','nombre_nivel1','nombre_nivel2','nombre_nivel3','nombre_nivel4'];
    protected $guarded = ['id'];
}
