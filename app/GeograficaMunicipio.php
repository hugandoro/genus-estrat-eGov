<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeograficaMunicipio extends Model
{
    protected $table = 'geografica_municipios';
    protected $fillable = ['departamento_id', 'categoria_municipal_id', 'nombre', 'descripcion', 'altitud_msnm', 'temperatura_c', 'area_km2', 'poblacion', 'fundacion', 'gentilicio', 'bandera', 'escudo','capital'];
    protected $guarded = ['id'];
}
