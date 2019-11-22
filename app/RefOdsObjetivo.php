<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefOdsObjetivo extends Model
{
    protected $table = 'ref_ods_objetivos';
    protected $fillable = ['nombre','descripcion'];
    protected $guarded = ['id'];
}
