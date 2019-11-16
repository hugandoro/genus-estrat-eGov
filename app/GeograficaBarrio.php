<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeograficaBarrio extends Model
{
    protected $table = 'geografica_barrios';
    protected $fillable = ['comuna_id', 'nombre'];
    protected $guarded = ['id'];
}
