<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContableFuenteRecurso extends Model
{
    protected $table = 'contable_fuente_recursos';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
