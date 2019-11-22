<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefDepartamentalPolitica extends Model
{
    protected $table = 'ref_departamental_politicas';
    protected $fillable = ['nombre','descripcion'];
    protected $guarded = ['id'];
}
