<?php

namespace App\Listeners;

use App\Events\IngresoUsuario;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InformarUsuarioSala
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  IngresoUsuario  $event
     * @return void
     */
    public function handle(IngresoUsuario $event)
    {
        //
        $usuario = $event->getUsuario();
        echo $usuario;
    }
}
