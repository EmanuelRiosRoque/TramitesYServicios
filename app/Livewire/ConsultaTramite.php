<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TramiteServicio;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth; // importante importar Auth

#[Layout('layouts.app')] 
class ConsultaTramite extends Component
{
    public $tramites;

    public function mount() 
    {
        if (Auth::user()->hasRole('Revisor')) {
            // Solo trámites en estatus 2 para Revisores
            $this->tramites = TramiteServicio::where('fk_estatus', 2)->get();
        } else {
            // Para todos los demás usuarios
            $this->tramites = TramiteServicio::all();
        }
    }

    public function render()
    {
        return view('livewire.consulta-tramite');
    }
}
