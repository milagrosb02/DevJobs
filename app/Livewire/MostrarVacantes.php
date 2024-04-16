<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    protected $listeners = ['eliminarVacante'];

    public function eliminarVacante(Vacante $vacante) // le paso el id de la vacante
    {
        $vacante->delete();
    }

    public function render()
    {   
        // consulto las vacantes del usuario autenticado
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(1);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
