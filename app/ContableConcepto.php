<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContableConcepto extends Model
{
    protected $table = 'contable_conceptos';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
