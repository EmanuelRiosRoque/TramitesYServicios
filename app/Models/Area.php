<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'domicilio_unidad_administrativa',
        'piso',
        'unidad_administrativa',
        'horario_atencion_publico',
        'area',
        'telefono',
        'area_telefono',
        'correo_electronico',
        'area_correo',
    ];
}
