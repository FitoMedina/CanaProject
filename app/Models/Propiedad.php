<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;
    protected $table = 'propiedad';
    public $timestamps = false;
    protected $fillable = ['codigo','hectareas','nombre','ubicacion','fecha_proceso','fecha_hasta','indicador'];
}
