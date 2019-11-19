<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadTipo extends Model
{
    protected $table = 'entidad_tipos';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
