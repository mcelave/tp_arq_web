<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

 class UserByRoom extends Model {

    protected $table = 'users_by_room';
    protected $fillable = ['userId', 'roomId'];

    public static function defineRelationship($user, $room) {
        return UserByRoom::create(['userId' => $user->id, 'roomId' => $room->id]);
    }

    public static function usersIn($room) {
        return UserByRoom::where(['roomId' => $room->id])->pluck('user');
    }

    public static function roomsFor($user) {
        return UserByRoom::where(['userId' => $user->id])->pluck('room');
    }

    public static function hosting($room, $user) {
        return UserByRoom::where(['userId' => $user->id, 'roomId' => $room->id])->get()->isNotEmpty();
    }
}
