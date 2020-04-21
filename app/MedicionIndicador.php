<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicionIndicador extends Model
{
    protected $table = 'medicion_indicadors';
    protected $fillable = ['nombre','unidad_medida_id','linea_base','vigencia_id_base','meta','objetivo','medida_id','tipo_id','nivel4_id'];
    protected $guarded = ['id'];

    //Relaciones
    public function unidadMedida(){
        return $this->belongsTo('App\MedicionUnidadMedida', 'unidad_medida_id');
    }

    //Relaciones
    public function vigenciaBase(){
        return $this->belongsTo('App\GeneralVigencia', 'vigencia_id_base');
    }

    //Relaciones
    public function Medida(){
        return $this->belongsTo('App\MedicionMedida', 'medida_id');
    }

    //Relaciones
    public function Tipo(){
        return $this->belongsTo('App\MedicionTipo', 'tipo_id');
    }

    //Relaciones
    public function Nivel4(){
        return $this->belongsTo('App\PlanDesarrolloNivel4', 'nivel4_id');
    }
}
