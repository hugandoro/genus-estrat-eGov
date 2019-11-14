<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeograficaRegion extends Model
{
    protected $table = 'geografica_regions';
    protected $fillable = ['estado_id', 'nombre', 'descripcion'];
    protected $guarded = ['id'];
}
