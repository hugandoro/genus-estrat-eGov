<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administracion extends Model
{
    protected $table = 'administracions';
    protected $fillable = ['nombre_representante','vigencia_id_inicial','vigencia_id_final','slogan'];
    protected $guarded = ['id'];
}
