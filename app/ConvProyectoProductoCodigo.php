<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConvProyectoProductoCodigo extends Model
{
    protected $table = 'conv_proyecto_producto_codigos';
    protected $fillable = ['codigo','nombre'];
    protected $guarded = ['id'];
}

