<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TramiteServicio;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')] 
class ConsultaTramite extends Component
{
    public $tramites;
    public function mount() 
    {
        $this->tramites = TramiteServicio::all();
    }

    public function render()
    {
        return view('livewire.cosulta-tramite');
    }
}
