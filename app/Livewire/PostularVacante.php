<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PostularVacante extends Component
{

    use WithFileUploads;

    // wire:model en la vista
    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];


    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }


    // esta funcion es llamada en el form de la vista
    public function postularme()
    {
        $datos = $this->validate();

        // Almacenar cv en el disco duro
        $cv = $this->cv->store('public/cv');

        // $datos['cv] deberia ser la forma correcta
        $datos['cv'] = str_replace('public/cv/', '', $cv);


        // Crear candidato para que pueda postularse a la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],
        ]);


        // Crear notificacion y enviar email


        // Mostrar el usuario mensaje de ok
        session()->flash('mensaje', 'Se envió correctamente tu información, mucha suerte!');

        return redirect()->back();
    }


    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
