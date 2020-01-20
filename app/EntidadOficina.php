<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadOficina extends Model
{
    protected $table = 'entidad_oficinas';
    protected $fillable = ['entidad_id','tipo_oficina_id','nombre','responsable'];
    protected $guarded = ['id'];

    //Relaciones
    public function entidad(){
        return $this->belongsTo('App\Entidad', 'entidad_id');
    }

    public function tipoOficina(){
        return $this->belongsTo('App\EntidadTipoOficina', 'tipo_oficina_id');
    }
}
