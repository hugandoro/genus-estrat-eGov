<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadTipoOficina extends Model
{
    protected $table = 'entidad_tipo_oficinas';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
