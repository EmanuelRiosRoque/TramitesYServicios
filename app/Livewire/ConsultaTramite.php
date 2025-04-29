<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TramiteServicio;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')] 
class ConsultaTramite extends Component
{
    public $tramites = []; // 👈 IMPORTANTE: Declararla pública para Livewire
    public $filtro = 'todos';

    public function setFiltro($tipo)
    {
        $this->filtro = $tipo;
    }

    public function render()
    {
        $query = TramiteServicio::query()
            ->where('fk_estatus', Auth::user()->hasRole('Revisor') ? 2 : '>=', 1);

        if ($this->filtro !== 'todos') {
            $query->whereJsonContains('tipo', $this->filtro);
        }

        $this->tramites = $query->get(); // 👈 Aquí llenas la propiedad pública
        
        return view('livewire.consulta-tramite');
    }
}
