<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefNacionalPolitica extends Model
{
    protected $table = 'ref_nacional_politicas';
    protected $fillable = ['nombre','descripcion'];
    protected $guarded = ['id'];
}
