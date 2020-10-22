<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected $table = 'contrato';
    public $timestamps = false;
    protected $fillable = ['codigo','faltas','fecha_inicio','fecha_fin','incentivo','monto_incentivo','sueldo','viatico','cod_trabajador','cod_canero','fecha_proceso','fecha_hasta','indicador'];
}
