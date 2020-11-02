<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;
    protected $table = 'entrega';
    public $timestamps = false;
    protected $fillable = ['codigo','fecha_entrega','paquete','peso_neto','cod_corte','cod_tipo','cod_chata','cod_camion','cod_trabajador','cod_canero','fecha_proceso','fecha_hasta','indicador'];
}
