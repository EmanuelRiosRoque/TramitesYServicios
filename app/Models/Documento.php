<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = [
        'clas',
        'tipo_formato',
        'formato',
        'archivo',
        'url',
        'ultima_fecha_publicacion',
        'fundamento_documento',
    ];
}
