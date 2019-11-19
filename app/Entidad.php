<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table = 'entidads';
    protected $fillable = ['orden_id','tipo_id','categoria_id','sector_id','nombre','direccion','telefono','email','municipio_id'];
    protected $guarded = ['id'];
}
