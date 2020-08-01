<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanAccion extends Model
{
    protected $table = 'plan_accions';
    protected $fillable = [ 'plan_indicativo_id',
                            'descripcion',
                            'kpi',
                            'objetivo',
                            'ponderacion'];
    protected $guarded = ['id'];

    //Relaciones
    public function planIndicativo(){
        return $this->belongsTo('App\PlanIndicativo', 'plan_indicativo_id');
    }
}