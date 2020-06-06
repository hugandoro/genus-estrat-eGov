<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanDesarrolloNivel4 extends Model
{
    protected $table = 'plan_desarrollo_nivel4s';
    protected $fillable = ['nivel3_id','numeral','nombre','objetivo','oficina_id'];
    protected $guarded = ['id'];

     //Relaciones
    public function entidadOficina(){
        return $this->belongsTo('App\EntidadOficina', 'oficina_id');
    }

    //Relacion muchos a muchos para TABLA PIVOTE
    public function ods()
    {
        return $this->belongsToMany('App\RefOdsObjetivo', 'Ods_nivel4s', 'nivel4_id', 'ods_id');
    }
}