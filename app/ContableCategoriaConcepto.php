<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContableCategoriaConcepto extends Model
{
    protected $table = 'contable_categoria_conceptos';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
