<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiscalMarco extends Model
{
    protected $table = 'fiscal_marcos';
    protected $fillable = ['entidad_id','vigencia_id_inicial','vigencia_id_final'];
    protected $guarded = ['id'];
}
