<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanDesarrolloNivel1 extends Model
{
    protected $table = 'plan_desarrollo_nivel1s';
    protected $fillable = ['plan_desarrollo_id','numeral','nombre','descripcion'];
    protected $guarded = ['id'];
}
