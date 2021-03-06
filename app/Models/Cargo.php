<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $table = 'cargo';
    public $timestamps = false;
    protected $fillable = ['codigo','nombre','sueldo','fecha_proceso','fecha_hasta','indicador'];
}
