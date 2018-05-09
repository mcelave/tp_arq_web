<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\IngresoUsuario;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\App;

use Pusher\Pusher;

use App\Models\Usuario;
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
    
        $us = new Usuario($usuario->nombre, $usuario->id);

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


        /* Aca hago que el  la accion notify, y le atachedo el notidy event pasando como parametro el el nombre del usuario. Del lado del cliente esto puede verse, en la vista en sala.blade.php  var channel = pusher.subscribe('notify') con su handler. Es parecido al codigo de abajo pero, con pusher todos los clientes se enteran, es decir si tenes otras ventanas abiertas en la lista de usuarios presentes les va va aparecerl porque el handler lo agrega.                 
        */
        $pusher->trigger('notify', 'notify-event', $usuario->nombre); 


        /* esta parte de codigo dispara un evento pero no a todos los clientes como si lo hace pusher
        $usuario = DB::table('usuarios')->where('id', $id)->first();
    
        $us = new usuario($usuario->nombre, $usuario->id);

        $response = Event::fire( new IngresoUsuario( $us ));
        */
        return view('sala',[ 'mensajes' => $mensajes, 'mensaje' =>' ', 'usuarios' => $usuarios ] );

    }

 public function buscarUsuarios(Request $request)
    {

        $usuarios = DB::table('usuarios')->get();  
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
