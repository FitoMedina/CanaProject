<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corte extends Model
{
    use HasFactory;
    protected $table = 'corte';
    public $timestamps = false;
    protected $fillable = ['codigo','descripcion','fecha_proceso','fecha_hasta','indicador'];
}
