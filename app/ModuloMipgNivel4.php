<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuloMipgNivel4 extends Model
{
    protected $table = 'modulo_mipg_nivel4s';
    protected $fillable = ['nivel3_id','numeral','accion','descripcion_corta','descripcion_larga','linea_base','meta','objetivo','unidad_medida','medida_id','tipo_id','vigencia_id','oficina_id','valor_realizado','porcentaje_realizado','rezago'];
    protected $guarded = ['id'];

    //Relaciones
     public function Medida(){
        return $this->belongsTo('App\MedicionMedida', 'medida_id');
    }
    //Relaciones
     public function Tipo(){
        return $this->belongsTo('App\MedicionTipo', 'tipo_id');
    }
    //Relaciones
     public function Vigencia(){
        return $this->belongsTo('App\GeneralVigencia', 'vigencia_id');
    }
     //Relaciones
     public function entidadOficina(){
        return $this->belongsTo('App\EntidadOficina', 'oficina_id');
    }

     //Relaciones
     public function nivel3(){
        return $this->belongsTo('App\ModuloMipgNivel3', 'nivel3_id');
    }
}
