<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeograficaCorregimiento extends Model
{
    protected $table = 'geografica_corregimientos';
    protected $fillable = ['municipio_id', 'nombre'];
    protected $guarded = ['id'];
}
