<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return view('sala', [ 'mensajes' => $mensajes  ] );

    }


public function enviarMensaje(Request $request)
{

     $name = $request->input('mensaje');
    

      $date = date('Y-m-d H:i:s');

     $id = DB::table('mensajes')->insertGetId( [ 'contenido' => $name,'id_usuario' => 2, 'fecha' =>  $date]) ;

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
