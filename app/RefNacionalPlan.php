<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefNacionalPlan extends Model
{
    protected $table = 'ref_nacional_plans';
    protected $fillable = ['codigo','nombre','descripcion','estado_id'];
    protected $guarded = ['id'];

    //Relacion muchos a muchos para TABLA PIVOTE
    public function nivel4()
    {
        return $this->belongsToMany('App\PlanDesarrolloNivel4', 'nacionalplan_nivel4s', 'nacionalplan_id', 'nivel4_id');
    }
}
