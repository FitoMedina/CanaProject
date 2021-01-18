<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipochata extends Model
{
    use HasFactory;
    protected $table = 'tipo_chata';
    public $timestamps = false;
    protected $fillable = ['codigo','descripcion','rodamientogrande','rodamientopeque','reten','detallerodagrande','detallerodapeque','detalleretenpeque','detalleretengrande','fecha_proceso','fecha_hasta','indicador'];
}
