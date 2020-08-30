<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tareas';
    protected $fillable = ['fecha_realizacion,
                            descripcion,
                            accion_id,
                            zona_id,
                            comuna_id,
                            corregimiento_id,
                            poblacion_id,
                            sexo_id,
                            poblacion,
                            impacto_kpi,
                            evidencia_pdf,
                            valor_pesos,
                            user_id'];
    protected $guarded = ['id'];

    //Relaciones
    public function accion(){
        return $this->belongsTo('App\PlanAccion', 'accion_id');
    }

    public function zona(){
        return $this->belongsTo('App\GeneralZona', 'zona_id');
    }

    public function comuna(){
        return $this->belongsTo('App\GeograficaComuna', 'comuna_id');
    }

    public function corregimiento(){
        return $this->belongsTo('App\GeograficaCorregimiento', 'corregimiento_id');
    }

    public function poblacion(){
        return $this->belongsTo('App\GeneralPoblacion', 'poblacion_id');
    }

    public function sexo(){
        return $this->belongsTo('App\GeneralSexo', 'sexo_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
