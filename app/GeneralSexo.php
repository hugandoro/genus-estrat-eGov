<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSexo extends Model
{
    protected $table = 'general_sexos';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
