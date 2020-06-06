<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OdsNivel4 extends Model
{
    protected $table = 'ods_nivel4s';
    protected $fillable = ['nivel4_id','ods_id'];
    //protected $guarded = ['id'];

    //Relaciones
    public function odsInformacion(){
        return $this->belongsTo('App\RefOdsObjetivo', 'ods_id');
    }
}
