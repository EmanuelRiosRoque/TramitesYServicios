<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TramiteServicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'origen',
        'fundamento_tramite',
        'nombre_tramite',
        'descripcion',
        'tipo',
        'formato_requerido',
        'modalidad'
    ];

    // 🚀 Aquí el cast
    protected $casts = [
        'tipo' => 'array',
    ];
}
