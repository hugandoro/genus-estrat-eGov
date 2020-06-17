<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanIndicativo extends Model
{
    protected $table = 'plan_indicativos';
    protected $fillable = [ 'indicador_id',
                            'vigencia_id',
                            'valor'];
    protected $guarded = ['id'];

    //Relaciones
    public function indicador(){
        return $this->belongsTo('App\Medicionindicador', 'indicador_id');
    }

    //Relaciones
    public function vigencia(){
        return $this->belongsTo('App\GeneralVigencia', 'vigencia_id');
    }
}