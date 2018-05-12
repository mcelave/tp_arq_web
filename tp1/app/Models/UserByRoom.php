<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

 class UserByRoom extends Model {

    protected $table = 'room_user';
    protected $fillable = ['user_id', 'room_id'];

    public static function defineRelationship($user, $room) {
        $room-> users()-> save($user);
        // return UserByRoom::create(['user_id' => $user->id, 'roomId' => $room->id]);
    }

    public static function hosting($room, $user) {
        // $room-> users()-> save($user);
        // $user-> rooms()-> save($room);
        // return UserByRoom::where(['user_id' => $user->id, 'roomId' => $room->id])->get()->isNotEmpty();
    }
}