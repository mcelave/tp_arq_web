<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
}); */

use Illuminate\Support\Facades\App;
use App\usuario;
use App\Events\IngresoUsuario;


Route::get('/','UserController@index');

Route::get('/sala','SalaController@buscarMensajes');
//Route::get('/mensajes','Hello@buscarMensajes');

Route::get('/notify', 'PusherController@sendNotification');

Route::get('/cargarParticipantes', 'UserController@buscarUsuarios');

Route::view('/home', 'home');

Route::get('/hello',function(){
    //return 'Hello martin,ezequiel,martin,cristian!';
	return view('sala');
});

Route::get('/bridge', function() {
    $pusher = App::make('pusher');

    /*$pusher->trigger( 'test-channel',
                      'test-event', 
                      array('text' => 'Preparing the Pusher Laracon.eu workshop!')); */

    return view('welcome');
});



/*Route::post('/usuario/store', function () {

    

        
            probando los events listeners andan bien pero .. como hacer que se actualicen a los demas cients
        $usuario = DB::table('usuarios')->where('id', $id)->first();
    
        $us = new usuario($usuario->nombre, $usuario->id);

        $response = Event::fire( new IngresoUsuario( $us ));
        
        echo 'asdasdssss';

        $us = new usuario('eluser', 1000);

      //  return view('sala',[ 'mensajes' => $mensajes, 'mensaje' =>' ', 'usuarios' =>        $usuarios ] );

        $mensajes =  array();
      
     
        $usuarios = array();
        array_push($usuarios,$us);
   		 broadcast(new IngresoUsuario($us))->toOthers();

   		 return view('sala',[ 'mensajes' => $mensajes, 'mensaje' =>' ', 'usuarios' =>        $usuarios ] );

    //return ['status' => 'OK'];
});*/


//Route::get('/{id}', 'SalaController@show');

//Route::post('/mensajes/enviar', 'SalaController@enviarMensaje');

Route::post('/usuario/store', 'UserController@guardar');


