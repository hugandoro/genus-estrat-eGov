<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConvProyectoIndicadorCodigo extends Model
{
    protected $table = 'conv_proyecto_indicador_codigos';
    protected $fillable = ['codigo','nombre'];
    protected $guarded = ['id'];
}

