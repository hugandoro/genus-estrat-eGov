<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefNacionalPlan extends Model
{
    protected $table = 'ref_nacional_plans';
    protected $fillable = ['codigo','nombre','descripcion','estado_id'];
    protected $guarded = ['id'];
}
