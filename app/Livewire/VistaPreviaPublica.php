<?php

namespace App\Livewire;

use App\Models\Paso;
use App\Models\TramiteServicio;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class VistaPreviaPublica extends Component
{
    public $tramite;
    public $pasos;
    public function mount($id) 
    {
        $this->tramite = TramiteServicio::find($id);
        $this->pasos = Paso::where('tramite_servicio_id', $id)->get();
        // dd($this->tramite, $this->pasos);
    }

    public function render()
    {
        return view('livewire.vista-previa-publica');
    }
}
