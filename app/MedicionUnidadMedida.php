<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicionUnidadMedida extends Model
{
    protected $table = 'medicion_unidad_medidas';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
