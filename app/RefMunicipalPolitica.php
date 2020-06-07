<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefMunicipalPolitica extends Model
{
    protected $table = 'ref_municipal_politicas';
    protected $fillable = ['nombre','descripcion','municipio_id'];
    protected $guarded = ['id'];

    //Relacion muchos a muchos para TABLA PIVOTE
    public function nivel4()
    {
        return $this->belongsToMany('App\PlanDesarrolloNivel4', 'municipalpolitica_nivel4s', 'municipalpolitica_id', 'nivel4_id');
    }
}
