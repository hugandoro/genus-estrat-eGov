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
                            'ponderacion',
                            'n2022_converge_politica_publica',
                            'n2022_converge_pgirs',
                            'n2022_converge_gestion_riesgo',
                            'n2022_converge_mipg',
                            'n2022_recursos',
                            'n2022_fuente',
                            'n2022_codigo_fut',
                            'n2022_sector',
                            'n2022_codigo_bpim',
                            'n2022_producto_actividad_proyectos',
                            'n2022_ods'];
    protected $guarded = ['id'];

    //Relaciones
    public function planIndicativo(){
        return $this->belongsTo('App\PlanIndicativo', 'plan_indicativo_id');
    }
}