<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralVigencia extends Model
{
    protected $table = 'general_vigencias';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];

    //Relaciones
    public function administracionVigenciaInicial(){
        return $this->hasMany('App\GeneralVigencia', 'vigencia_id_inicial');
    }

    public function administracionVigenciaFinal(){
        return $this->hasMany('App\GeneralVigencia', 'vigencia_id_final');
    }

}

