<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefMunicipalPolitica extends Model
{
    protected $table = 'ref_municipal_politicas';
    protected $fillable = ['nombre','descripcion'];
    protected $guarded = ['id'];
}
