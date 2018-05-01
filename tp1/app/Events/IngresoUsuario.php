<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\usuario;

class IngresoUsuario implements ShouldBroadcast

{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    protected $usuario; // publico para pasarla a los listeners
    //public $text;

   public function __construct(usuario $usuario){
        
        $this->usuario = $usuario;
    }
    /*public function __construct( $text){
        
        $this->text = $text;
    }*/

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    /*public function broadcastOn()
    {
       // return new PrivateChannel('channel-name');
        return ['test-channel'];
    } */


    public function broadcastWith()
    {
        // This must always be an array. Since it will be parsed with json_encode()
        return [
            'usuario' => $this->usuario->nombre
        ];
    }
    public function broadcastOn()
    {
        return new Channel('chatroom');
    }

      public function broadcastAs()
    {
        return 'IngresoUsuario';
    }


    public function getUsuario(){
        return $this->usuario->nombre;

    }
}
