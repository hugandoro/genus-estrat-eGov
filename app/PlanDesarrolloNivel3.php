<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanDesarrolloNivel3 extends Model
{
    protected $table = 'plan_desarrollo_nivel3s';
    protected $fillable = ['nivel2_id','numeral','nombre','objetivo'];
    protected $guarded = ['id'];
}
