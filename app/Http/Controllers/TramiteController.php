<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TramiteController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());

        // $request->validate([
        //     'origen' => 'required',
        //     'input1' => 'required|string',
        //     'input2' => 'required|string',
        //     'tipo' => 'required|array|min:1',
        //     'formato' => 'required',
        // ]);

        return redirect()->route('formulario.tramite')->with('message', 'Formulario enviado correctamente.');
    }
}
