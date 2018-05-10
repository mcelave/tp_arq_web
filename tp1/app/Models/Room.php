<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserByRoom;

class Room extends Model { 

	private const MAIN_ROOM_NAME = 'Lobby principal';

	
	protected $fillable = ['name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

	public static function createRoom($name){
		return Room::create(['name'=> $name ]);
	}

	public static function createMainRoom(){
		Room::createRoom(self::MAIN_ROOM_NAME);
	}

	public static function getMainRoom(){
		return Room::where(['name' =>self::MAIN_ROOM_NAME])->first();
	}

	public function host($user){
		UserByRoom::defineRelationship($user, $this);
	}




}
