<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TramiteServicio;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class TramiteController extends Controller
{

    public function store(Request $request)
    {
        $tramite = TramiteServicio::create([
            'origen' => $request->origen,
            'nombre_tramite' => $request->nombreTramite,
            'descripcion' => $request->descripcionTramite,
            'tipo' => $request->tipo,
            'formato_requerido' => $request->formato,
            'fk_estatus' => 1,
        ]);
    
        ToastMagic::success('Trámite o Servicio Registrado exitosamente.');
    
        return redirect()->route('formulario.tramite', ['id' => $tramite->id]);
    }
    
}
