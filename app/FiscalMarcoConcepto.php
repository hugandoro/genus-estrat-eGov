<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiscalMarcoConcepto extends Model
{
    protected $table = 'fiscal_marco_conceptos';
    protected $fillable = ['marco_id','concepto_id',
    'vigencia_id_1','valor_1',
    'vigencia_id_2','valor_2',
    'vigencia_id_3','valor_3',
    'vigencia_id_4','valor_4',
    'vigencia_id_5','valor_5',
    'vigencia_id_6','valor_6',
    'vigencia_id_7','valor_7',
    'vigencia_id_8','valor_8',
    'vigencia_id_9','valor_9',
    'vigencia_id_10','valor_10'];
    protected $guarded = ['id'];
}
