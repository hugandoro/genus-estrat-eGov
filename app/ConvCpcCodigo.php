<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConvCpcCodigo extends Model
{
    protected $table = 'conv_cpc_codigos';
    protected $fillable = ['codigo','nombre'];
    protected $guarded = ['id'];
}

