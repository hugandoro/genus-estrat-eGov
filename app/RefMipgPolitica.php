<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefMipgPolitica extends Model
{
    protected $table = 'ref_mipg_politicas';
    protected $fillable = ['nombre', 'dimension', 'logo'];
    protected $guarded = ['id'];

    //Relacion muchos a muchos para TABLA PIVOTE
    public function nivel4()
    {
        return $this->belongsToMany('App\PlanDesarrolloNivel4', 'Mipg_nivel4s', 'mipg_id', 'nivel4_id');
    }
}

