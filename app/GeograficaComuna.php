<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeograficaComuna extends Model
{
    protected $table = 'geografica_comunas';
    protected $fillable = ['municipio_id', 'nombre'];
    protected $guarded = ['id'];
}
