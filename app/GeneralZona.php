<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralZona extends Model
{
    protected $table = 'general_zonas';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
