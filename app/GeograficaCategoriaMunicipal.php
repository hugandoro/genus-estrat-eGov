<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeograficaCategoriaMunicipal extends Model
{
    protected $table = 'geografica_categoria_municipals';
    protected $fillable = ['estado_id', 'nombre', 'poblacion_min', 'poblacion_max', 'icld_min', 'icld_max'];
    protected $guarded = ['id'];
}
