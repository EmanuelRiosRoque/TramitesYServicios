<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')] 
class FormularioTramite extends Component
{

    public $tab;
    public $paso = [];
    public $formatoRequerido;

    public $formData = [];

    public function submit()
    {
        dd($this->formData);
    }

    


    public function render()
    {
        return view('livewire.formulario-tramite');
    }
}
