<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralPoblacion extends Model
{
    protected $table = 'general_poblacions';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
