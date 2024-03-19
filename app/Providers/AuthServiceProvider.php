<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

   

    // este metodo se manda a llamar cada vez que el usuario presione "enviar confirmacion de email"
    public function boot()
    {
        $this->registerPolicies();

        // llamo a la clase de verificar email y le paso dos parametros (notificacion y URL)
        VerifyEmail::toMailUsing(function($notifiable, $url){

            return (new MailMessage)
                ->subject('Verificar Cuenta')
                ->line('Tu cuenta ya esta casi lista, sólo debes presionar el enlace a continuación')

                // Boton
                ->action('Confirmar Cuenta', $url)

                ->line('Si no creaste esta cuenta puedes ignorar este mensaje');

        });

    }
}
