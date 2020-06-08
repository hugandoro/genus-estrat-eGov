<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MipgNivel4 extends Model
{
    protected $table = 'mipg_nivel4s';
    protected $fillable = ['nivel4_id','mipg_id'];
    //protected $guarded = ['id'];

    //Relaciones
    public function mipgInformacion(){
        return $this->belongsTo('App\RefMipgPolitica', 'mipg_id');
    }
}
