<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MunicipalpoliticaNivel4 extends Model
{
    protected $table = 'municipalpolitica_nivel4s';
    protected $fillable = ['nivel4_id','municipalpolitica_id'];
    //protected $guarded = ['id'];

    //Relaciones
    public function municipalpoliticaInformacion(){
        return $this->belongsTo('App\RefMunicipalPolitica', 'municipalpolitica_id');
    }
}
