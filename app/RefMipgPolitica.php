<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefMipgPolitica extends Model
{
    protected $table = 'ref_mipg_politicas';
    protected $fillable = ['nombre', 'dimension', 'logo'];
    protected $guarded = ['id'];
}

