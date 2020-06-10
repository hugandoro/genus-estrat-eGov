<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanDesarrolloNivel1 extends Model
{
    protected $table = 'plan_desarrollo_nivel1s';
    protected $fillable = ['plan_desarrollo_id','numeral','nombre','objetivo'];
    protected $guarded = ['id'];

     //Relaciones
     public function plandesarrollo(){
        return $this->belongsTo('App\PlanDesarrollo', 'plan_desarrollo_id');
    }
}
