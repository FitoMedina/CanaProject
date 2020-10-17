<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canero extends Model
{
    use HasFactory;
    protected $table = 'canero';
    public $timestamps = false;
    protected $fillable = ['cod_canero','direccion','identificacion','nombre','telefono','fecha_proceso','fecha_hasta','indicador'];
}
