<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\IngresoUsuario;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\App;

use Pusher\Pusher;

use App\usuario;
use DB;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $users;

    public function index()
    {
        return view('usuarios' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        

    }


     public function guardar(Request $request)
    {
        //

        $nombre  = $request->input('nombre');

        $id = DB::table('usuarios')->insertGetId( [ 'nombre' => $nombre ]) ;

        $usuarios = DB::table('usuarios')->get();
        $mensajes = DB::table('mensajes')->get();

        $usuario = DB::table('usuarios')->where('id', $id)->first();
    
        $us = new usuario($usuario->nombre, $usuario->id);

          $options = array(
            'cluster' => 'us2', 
            'encrypted' => true
        );
 
       //Remember to set your credentials below.
        /*$pusher = new Pusher(
            '9565156bc0be46907d1c',
            '32a2b4f4346ecfac7ca3',
            '517414',
            $options
        );*/
        
         $pusher = App::make('pusher');


        //primer parametro nombre del channel, segundo el nombre del evento
        $pusher->trigger('notify', 'notify-event', $usuario->nombre); 




        /*
            probando los events listeners andan bien pero .. como hacer que se actualicen a los demas cients
        $usuario = DB::table('usuarios')->where('id', $id)->first();
    
        $us = new usuario($usuario->nombre, $usuario->id);

        $response = Event::fire( new IngresoUsuario( $us ));
        */
        return view('sala',[ 'mensajes' => $mensajes, 'mensaje' =>' ', 'usuarios' =>        $usuarios ] );

    }

 public function buscarUsuarios(Request $request)
    {

        $usuarios = DB::table('usuarios')->get();
        //echo 'buscando usuarios';
        
        //return 'hola';
        //return $usuarios;
       
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response */
     
    public function store(Request $request)
    {
      
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
