<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NacionalplanNivel4 extends Model
{
    protected $table = 'nacionalplan_nivel4s';
    protected $fillable = ['nivel4_id','nacionalplan_id'];
    //protected $guarded = ['id'];

    //Relaciones
    public function nacionalplanInformacion(){
        return $this->belongsTo('App\RefNacionalPlan', 'nacionalplan_id');
    }
}
