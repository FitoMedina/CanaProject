<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;
    protected $table = 'lote';
    public $timestamps = false;
    protected $fillable = ['codigo','descripcion','cod_propiedad','fecha_proceso','fecha_hasta','indicador'];
}
