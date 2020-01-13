<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table = 'entidads';
    protected $fillable = ['orden_id','tipo_id','categoria_id','sector_id','nombre','direccion','telefono','email','municipio_id'];
    protected $guarded = ['id'];

    //Relaciones
    public function orden(){
        return $this->belongsTo('App\EntidadOrden', 'orden_id');
    }

    public function tipo(){
        return $this->belongsTo('App\EntidadTipo', 'tipo_id');
    }

    public function categoria(){
        return $this->belongsTo('App\EntidadCategoria', 'categoria_id');
    }

    public function sector(){
        return $this->belongsTo('App\EntidadSector', 'sector_id');
    }

    public function municipio(){
        return $this->belongsTo('App\GeograficaMunicipio', 'municipio_id');
    }
}
