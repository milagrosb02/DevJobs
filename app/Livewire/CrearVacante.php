<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
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
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024'
    ];


    // defino la clase CrearVacante
    public function crearVacante()
    {
        // valida las reglas de las variables ($rules)
        // request de las variables ya validadas
        $datos = $this->validate();

        // 1- Almacenar la imagen
        $imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        // 2- Crear la vacante
        Vacante::create([
            'titulo' =>  $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id
        ]);

        // mensaje 
        session()->flash('mensaje', 'La vacante se publico correctamente. ');

        // 3- Redirecciono
        return redirect()->route('vacantes.index');
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
