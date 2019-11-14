<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeograficaDepartamento extends Model
{
    protected $table = 'geografica_departamentos';
    protected $fillable = ['region_id', 'nombre'];
    protected $guarded = ['id'];
}
