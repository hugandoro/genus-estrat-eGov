<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadCategoria extends Model
{
    protected $table = 'entidad_categorias';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
