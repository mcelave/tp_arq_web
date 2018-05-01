<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;
use Illuminate\Support\Facades\App;


class PusherController extends Controller
{
    
 public function sendNotification()
    {
        //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'us2', 
            'encrypted' => true
        );
 
       //Remember to set your credentials below.
      /*  $pusher = new Pusher(
            '9565156bc0be46907d1c',
            '32a2b4f4346ecfac7ca3',
            '517414',
            $options
        );*/

         $pusher = App::make('pusher');
        
        $message= "Hello User";
        echo 'send notification';
        
        //Send a message to notify channel with an event name of notify-event
       $pusher->trigger('notify', 'notify-event', $message);  
    }

}
