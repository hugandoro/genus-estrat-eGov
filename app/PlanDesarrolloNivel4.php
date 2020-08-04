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

     //Relaciones
     public function nivel3(){
        return $this->belongsTo('App\PlanDesarrolloNivel3', 'nivel3_id');
    }

    //Relacion muchos a muchos para TABLA PIVOTE ODS
    public function ods()
    {
        return $this->belongsToMany('App\RefOdsObjetivo', 'ods_nivel4s', 'nivel4_id', 'ods_id');
    }

    //Relacion muchos a muchos para TABLA PIVOTE PLAN DESARROLLO NACIONAL
    public function nacionalplan()
    {
        return $this->belongsToMany('App\RefNacionalPlan', 'nacionalplan_nivel4s', 'nivel4_id', 'nacionalplan_id');
    }

    //Relacion muchos a muchos para TABLA PIVOTE POLITICA PUBLICA MUNICIPAL
    public function municipalpolitica()
    {
        return $this->belongsToMany('App\RefMunicipalPolitica', 'municipalpolitica_nivel4s', 'nivel4_id', 'municipalpolitica_id');
    }

    //Relacion muchos a muchos para TABLA PIVOTE POLITICAS MIPG
    public function mipg()
    {
        return $this->belongsToMany('App\RefMipgPolitica', 'mipg_nivel4s', 'nivel4_id', 'mipg_id');
    }

}