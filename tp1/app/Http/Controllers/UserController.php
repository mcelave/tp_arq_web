<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function index() {
        return view('login');
    }

    public function store(Request $request) {
        $request->validate(
            ['name' => 'required|unique:users',
                'age' => 'required',
                'city' => 'required'],
            ['name.required' => "El campo Apodo es obligatorio",
                'name.unique' => "El Apodo elegido ya está en uso",
                'age.required' => "El campo Edad es obligatorio",
                'city.required' => "El campo Ciudad es obligatorio"]);

        User::definedBy($request['name'], $request['age'], $request['city']);
        return redirect()->action('RoomController@mainRoom', ['name' => $request['name']]);
    }

    public function show($id) {
        //
    }


    public function destroy($id) {
        //
    }
}
