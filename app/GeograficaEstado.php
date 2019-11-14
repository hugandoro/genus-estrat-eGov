<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeograficaEstado extends Model
{
    protected $table = 'geografica_estados';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
