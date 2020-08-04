<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefOdsObjetivo extends Model
{
    protected $table = 'ref_ods_objetivos';
    protected $fillable = ['nombre','descripcion','logo'];
    protected $guarded = ['id'];

    //Relacion muchos a muchos para TABLA PIVOTE
    public function nivel4()
    {
        return $this->belongsToMany('App\PlanDesarrolloNivel4', 'ods_nivel4s', 'ods_id', 'nivel4_id');
    }
}

