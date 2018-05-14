<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

	protected $fillable = ['name', 'age', 'city'];
    protected $hidden = [];

	public static function definedBy($name, $age, $city) {
		return User::create(['name'=> $name, 'age'=> $age, 'city' => $city ]);
	}

	public static function named($name) {
		return User::where(['name'=> $name])->first();
	}

	public static function allUsers() {
		return User::all();
	}

	public function rooms() {
		return $this->belongsToMany('App\Models\Room');
	}
}
