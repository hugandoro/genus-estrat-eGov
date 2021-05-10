<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuloMipgTarea extends Model
{
    protected $table = 'modulo_mipg_tareas';
    protected $fillable = ['fecha_realizacion,
                            descripcion,
                            nivel4_id,
                            impacto_kpi,
                            evidencia_pdf,
                            user_id'];
    protected $guarded = ['id'];

    //Relaciones
    public function nivel4(){
        return $this->belongsTo('App\ModuloMipgNivel4', 'nivel4_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
