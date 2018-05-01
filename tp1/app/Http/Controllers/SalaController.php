<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;
use Illuminate\Support\Facades\App;

use DB;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function buscarMensajes(){

        $mensajes = DB::table('mensajes')->get();
        $usuarios = DB::table('usuarios')->get();
     
        // $options = array('cluster' => 'us2', 'encrypted' => true);
 
       //Remember to set your credentials below.
      /* $pusher = new Pusher(
            '9565156bc0be46907d1c',
            '32a2b4f4346ecfac7ca3',
            '517414',
            $options
        );*/
         
       // $pusher = App::make('pusher');

        $message= "Hello User";
        
        //Send a message to notify channel with an event name of notify-event
        //$pusher->trigger('notify', 'notify-event', $message);  


        return view('sala', [ 'mensajes' => $mensajes,  'usuarios' => $usuarios   ] );

    }


public function enviarMensaje(Request $request)
{

     $contenido = $request->input('mensaje');
    

      $date = date('Y-m-d H:i:s');

     $id = DB::table('mensajes')->insertGetId( [ 'contenido' => $contenido,'id_usuario' => 2, 'fecha' =>  $date]) ;

     $mensajes = DB::table('mensajes')->get();

   
    return view('sala', [ 'mensajes' => $mensajes, 'mensaje' =>' '  ] );

}





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
