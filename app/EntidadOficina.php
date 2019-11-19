<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadOficina extends Model
{
    protected $table = 'entidad_oficinas';
    protected $fillable = ['entidad_id','tipo_oficina_id','nombre'];
    protected $guarded = ['id'];
}
