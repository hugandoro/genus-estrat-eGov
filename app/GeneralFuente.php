<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralFuente extends Model
{
    protected $table = 'general_fuentes';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
