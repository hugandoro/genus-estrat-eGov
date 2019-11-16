<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeograficaVereda extends Model
{
    protected $table = 'geografica_veredas';
    protected $fillable = ['corregimiento_id', 'nombre'];
    protected $guarded = ['id'];
}
