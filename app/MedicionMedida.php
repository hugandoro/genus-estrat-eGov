<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicionMedida extends Model
{
    protected $table = 'medicion_medidas';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
