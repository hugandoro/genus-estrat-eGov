<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuloMipgNivel2 extends Model
{
    protected $table = 'modulo_mipg_nivel2s';
    protected $fillable = ['nivel1_id','numeral','politica','descripcion_corta','descripcion_larga'];
    protected $guarded = ['id'];

     //Relaciones
     public function nivel1(){
        return $this->belongsTo('App\ModuloMipgNivel1', 'nivel1_id');
    }
}
