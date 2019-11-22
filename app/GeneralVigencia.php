<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralVigencia extends Model
{
    protected $table = 'general_vigencias';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
