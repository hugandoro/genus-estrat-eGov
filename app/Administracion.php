<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administracion extends Model
{
    protected $table = 'administracions';
    protected $fillable = ['nombre_representante','vigencia_id_inicial','vigencia_id_final','slogan','logo'];
    protected $guarded = ['id'];

    //Relaciones
    public function vigenciaInicial(){
        return $this->belongsTo('App\GeneralVigencia', 'vigencia_id_inicial');
    }

    public function vigenciaFinal(){
        return $this->belongsTo('App\GeneralVigencia', 'vigencia_id_final');
    }
}
