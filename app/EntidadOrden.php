<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadOrden extends Model
{
    protected $table = 'entidad_ordens';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
