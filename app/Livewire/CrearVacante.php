<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearVacante extends Component
{

    // Propiedades
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    // esto habilita la subida de archivos
    use WithFileUploads;


    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024'
    ];


    // defino la clase CrearVacante
    public function crearVacante()
    {
        // valida las reglas de las variables ($rules)
        $datos = $this->validate();
    }



    public function render()
    {
        // CONSULTAR DB
        // Traigo todos los registros
        $salarios = Salario::all();


        $categorias = Categoria::all();


        // de esta manera obtengo en la vista los registros del salario
        return view(
            'livewire.crear-vacante',
            [
                'salarios' => $salarios,
                'categorias' => $categorias
            ]
        );
    }
}
