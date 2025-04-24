<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')] 
class FormularioTramite extends Component
{

    public $tab;
    public $paso = [];
    

    public function render()
    {
        return view('livewire.formulario-tramite');
    }
}
