<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConvCcpetCodigo extends Model
{
    protected $table = 'conv_ccpet_codigos';
    protected $fillable = ['codigo','nombre'];
    protected $guarded = ['id'];
}

