<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'pago';
    public $timestamps = false;
    protected $fillable = ['codigo','fecha','monto','tipo','cod_contrato','fecha_proceso','fecha_hasta','indicador'];
}
