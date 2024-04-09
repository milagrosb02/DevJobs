<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditarVacante extends Component
{

    // defino atributos de la vista (de los wire:model)
    public $vacante_id;
    public $titulo; 
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva; // esto es para modificar la imagen si se requiere


    // esto habilita la subida de archivos
    use WithFileUploads;


    // reglas de validaciones
    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image|max:1024'
    ];



    // los life cicle hooks se usan en el componente
    public function mount(Vacante $vacante)
    {
        // accedo al atributo
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id; // esto debe ser igual al campo de la base de datos
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d'); // de esta manera formateo la fecha
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }



    public function editarVacante()
    {
        // llamo a la validacion
        $datos = $this->validate();

        // reviso si hay una nueva imagen
        if ($this->imagen_nueva) {
            
            $imagen = $this->imagen_nueva->store('public/vacantes');

            // en el array de datos, genero una posicion llamada imagen
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        }


        // encontrar la vacante a editar
        $vacante = Vacante::find($this->vacante_id);

        // asignar los valores
        // lo del array es lo de la instancia (mas arriba)
        // lo de al lado de vacante es el campo de la tabla
        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario']; 
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;


        // guardar la vacante
        $vacante->save();

        // redireccionar
        session()->flash('mensaje', 'La vacante se actualizó correctamente. ');

        return redirect()->route('vacantes.index');
    }



    public function render()
    {
        // CONSULTAR DB
        // Traigo todos los registros
        $salarios = Salario::all();
        $categorias = Categoria::all();


        return view('livewire.editar-vacante', [

            // estos datos se muestran en la vista, asi que son indispensables estas variables
            'salarios' => $salarios,
            'categorias' => $categorias

        ]);
    }
}
