<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chata extends Model
{
    use HasFactory;
    protected $table = 'chata';
    public $timestamps = false;
    protected $fillable = ['codigo','eje','reten','rodamiento','rueda','tara','cod_canero','fecha_proceso','fecha_hasta','indicador'];
}
