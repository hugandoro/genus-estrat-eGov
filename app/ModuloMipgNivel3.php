<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuloMipgNivel3 extends Model
{
    protected $table = 'modulo_mipg_nivel3s';
    protected $fillable = ['nivel2_id','numeral','categoria_autodiagnostico','descripcion_corta','descripcion_larga'];
    protected $guarded = ['id'];

     //Relaciones
     public function nivel2(){
        return $this->belongsTo('App\ModuloMipgNivel2', 'nivel2_id');
    }
}
