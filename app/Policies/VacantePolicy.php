<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacante;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class VacantePolicy
{
    use HandlesAuthorization;
    
    // Este método determina si un usuario puede ver la lista de vacantes.
    public function viewAny(User $user)
    {
        return $user->rol === 2;
    }


    // Este método podría utilizarse para definir si un usuario puede ver una vacante específica.
    public function view(User $user, Vacante $vacante)
    {
        //
    }

   
    // Este método determina si un usuario puede crear una nueva vacante
    public function create(User $user)
    {
        return $user->rol === 2;
    }

    
    // Este método determina si un usuario puede actualizar una vacante existente.
    public function update(User $user, Vacante $vacante)
    {
        // compruebo si el usuario actual/autenticado es la persona que va a editar el formulario
        return $user->id === $vacante->user_id;
    }

    
    //
    public function delete(User $user, Vacante $vacante)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vacante $vacante)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vacante $vacante)
    {
        //
    }
}
