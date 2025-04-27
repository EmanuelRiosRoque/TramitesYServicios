<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TramiteServicio;

class TramiteController extends Controller
{
    public function store(Request $request)
    {

        $tramite = TramiteServicio::create([
            'origen' => $request->origen,
            'nombre_tramite' => $request->nombreTramite,
            'descripcion' => $request->descripcionTramite,
            'tipo' => $request->tipo, 
            'formato_requerido' => $request->formato
        ]);

        return redirect()->route('formulario.tramite', ['id' => $tramite->id]);
       
    }
}
