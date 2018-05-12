<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserByRoom;

class Room extends Model {
	private const MAIN_ROOM_NAME = 'Lobby principal';
	
	protected $fillable = ['name', 'private'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

	public static function createRoom($name, $users, $private) {
		$room = Room::create(['name'=> $name, 'private'=> $private]);

		// If a user is repeated, we filter them out
		// this is to avoid having someone start a chat with himself
		// and creating the same entry two times in the room_user table
		$unique_users = array_unique($users);

		foreach ($unique_users as $user) {
			$room-> users()-> save($user);
		}

		return $room;
	}

	public static function createMainRoom() {
		Room::create(['name' => self::MAIN_ROOM_NAME, 'private'=> false]);
	}

	public static function getMainRoom(){
		return Room::where(['name' =>self::MAIN_ROOM_NAME])->first();
	}

	public function host($user){
		UserByRoom::defineRelationship($user, $this);
	}

	public function users() {
		return $this -> belongsToMany('App\Models\User');
	}
}
