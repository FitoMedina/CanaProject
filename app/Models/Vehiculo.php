<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $table = 'vehiculo';
    public $timestamps = false;
    protected $fillable = ['codigo','tara','placa','tipo','cod_canero','fecha_proceso','fecha_hasta','indicador'];
}
