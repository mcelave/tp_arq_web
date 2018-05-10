<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomMessage extends Model {    

	
	protected $fillable = [''];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

	public static function createRoomMessage($userId, $roomId, $message  ){
		return Room::create(['name'=> $name ]);
	}


}
