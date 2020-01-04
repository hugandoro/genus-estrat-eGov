<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanDesarrolloNivel4 extends Model
{
    protected $table = 'plan_desarrollo_nivel4s';
    protected $fillable = ['nivel3_id','numeral','nombre','descripcion','linea_base','objetivo','unidad_medida','tipo_id','medida_id','oficina_id'];
    protected $guarded = ['id'];
}
