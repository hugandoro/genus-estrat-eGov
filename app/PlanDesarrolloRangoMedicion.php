<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanDesarrolloRangoMedicion extends Model
{
    protected $table = 'plan_desarrollo_rango_medicions';
    protected $fillable = ['plan_desarrollo_id','nombre','color_hexa','rango_inicial','rango_final'];
    protected $guarded = ['id'];
}
