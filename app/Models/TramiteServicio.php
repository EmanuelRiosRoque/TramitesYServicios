<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TramiteServicio extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'modalidad',
        // 'fundamento_existencia',
        // 'area_obligada_responsable',
        'origen',
        'nombre_tramite_servicio',
        'descripcion_tramite_servicio',
        'tipo',
        'formato_requerido'
    ];

    protected $casts = [
        'tipo' => 'array', // Para que automáticamente Laravel maneje "tipo" como array
    ];
}
