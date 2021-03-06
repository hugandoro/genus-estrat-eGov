<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanDesarrolloNivel2 extends Model
{
    protected $table = 'plan_desarrollo_nivel2s';
    protected $fillable = ['nivel1_id','numeral','nombre','objetivo'];
    protected $guarded = ['id'];

     //Relaciones
     public function nivel1(){
        return $this->belongsTo('App\PlanDesarrolloNivel1', 'nivel1_id');
    }
}
