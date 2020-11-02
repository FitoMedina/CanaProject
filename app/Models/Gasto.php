<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    protected $table = 'gasto';
    public $timestamps = false;
    protected $fillable = ['codigo','interes','monto','motivo','cod_camion','cod_chata','cod_lote','cod_canero','fecha_proceso','fecha_hasta','indicador'];
}
