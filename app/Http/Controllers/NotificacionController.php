<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    
    public function __invoke(Request $request)
    {
        // En este controlador, puedo acceder a la lista de notificaciones
        
        $notificaciones = auth()->user()->unreadNotifications;


        // Limpiar notificaciones
        auth()->user()->unreadNotifications->markAsRead();
        

        return view('notificaciones.index', [
            'notificaciones' => $notificaciones
        ]);
    }
}
