<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
   
    public function index()
    {   
        // le paso la funcion del polici junto al modelo
        $this->authorize('viewAny', Vacante::class);
        return view('vacantes.index');
    }

    


    public function create()
    {
        $this->authorize('create', Vacante::class);
        return view('vacantes.create');
    }


    


    public function show(Vacante $vacante)
    {
        return view('vacantes.show', 
        [
            'vacante' => $vacante
        ]);
    }

    


    public function edit(Vacante $vacante)
    {
        // esto busca en el archivo del policy
        $this->authorize('update', $vacante);

        return view('vacantes.edit', [
            'vacante' => $vacante
        ]);
    }

    
}
