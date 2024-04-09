<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
   
    public function index()
    {
        return view('vacantes.index');
    }

    


    public function create()
    {
        return view('vacantes.create');
    }

    


    public function store(Request $request)
    {
        //
    }

    


    public function show(string $id)
    {
        //
    }

    


    public function edit(Vacante $vacante)
    {
        // esto busca en el archivo del policy
        $this->authorize('update', $vacante);

        return view('vacantes.edit', [
            'vacante' => $vacante
        ]);
    }

    


    public function update(Request $request, string $id)
    {
        //
    }

    

    
    public function destroy(string $id)
    {
        //
    }
}
