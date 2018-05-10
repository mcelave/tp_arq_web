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
use App\Models\Usuario;
use App\Events\IngresoUsuario;


Route::get('/','UserController@index');

Route::post('/users/store', 'UserController@store');

Route::get('/room', 'RoomController@index');

Route::get('/trigger', 'RoomController@trigger');

Route::get('/sala','SalaController@buscarMensajes');

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

Route::post('/mensajes/enviar', 'SalaController@enviarMensaje');




