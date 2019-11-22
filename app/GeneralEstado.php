<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralEstado extends Model
{
    protected $table = 'general_estados';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
