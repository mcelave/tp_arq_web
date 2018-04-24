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


Route::get('/','SalaController@buscarMensajes');
//Route::get('/mensajes','Hello@buscarMensajes');



Route::get('/hello',function(){
    //return 'Hello martin,ezequiel,martin,cristian!';
	return view('sala');
});


//Route::get('/{id}', 'SalaController@show');

Route::post('/mensajes/enviar', 'SalaController@enviarMensaje');

