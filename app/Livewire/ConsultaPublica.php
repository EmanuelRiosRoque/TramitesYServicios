<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TramiteServicio;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ConsultaPublica extends Component
{
    public string $tipoActivo = 'tramite';
    public string $search = '';

    public function setTipo($tipo)
    {
        $this->tipoActivo = $tipo;
        $this->reset('search');
    }

    public function render()
    {
        $query = TramiteServicio::query()
            ->where('fk_estatus', 4);

        if ($this->search !== '') {
            // Si está buscando, ignorar tipo
            $query->where(function ($q) {
                $q->whereRaw('LOWER(nombre_tramite) LIKE ?', ['%' . strtolower($this->search) . '%']);
            });
        } else {
            // Si no está buscando, filtrar por tipo activo
            $query->whereJsonContains('tipo', $this->tipoActivo);
        }

        $tramites = $query->get();

        return view('livewire.consulta-publica', compact('tramites'));
    }
}
