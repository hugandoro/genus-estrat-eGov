<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadSector extends Model
{
    protected $table = 'entidad_sectors';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
