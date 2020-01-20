<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanDesarrollo extends Model
{
    protected $table = 'plan_desarrollos';
    protected $fillable = ['administracion_id','nombre_nivel1','nombre_nivel2','nombre_nivel3','nombre_nivel4'];
    protected $guarded = ['id'];

    //Relaciones
    public function administracion(){
        return $this->belongsTo('App\Administracion', 'administracion_id');
    }
}
