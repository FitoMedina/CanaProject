<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipocana extends Model
{
    use HasFactory;
    protected $table = 'tipo_cana';
    public $timestamps = false;
    protected $fillable = ['codigo','descripcion','fecha_proceso','fecha_hasta','indicador'];
}
