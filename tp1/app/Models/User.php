<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
	protected $fillable = ['name', 'age', 'city'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

	public static function createUser($name,$age,$city){
		return User::create(['name'=> $name, 'age'=> $age, 'city' => $city ]);
	}

	public static function getUserNamed($name){
		return User::where(['name'=> $name])->first();
	}

	public static function getAllUsers() {
		return User::all(['columns'=>'name']);
	}

	public function mensajes(){
		return $this->hasMany(Mensaje::class);
	}
}
