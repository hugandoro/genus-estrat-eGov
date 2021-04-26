<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuloMipgNivel1 extends Model
{
    protected $table = 'modulo_mipg_nivel1s';
    protected $fillable = ['numeral','dimension','descripcion_corta','descripcion_larga'];
    protected $guarded = ['id'];
}
