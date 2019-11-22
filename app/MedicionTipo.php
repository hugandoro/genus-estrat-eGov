<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicionTipo extends Model
{
    protected $table = 'medicion_tipos';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
