<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserByRoom extends Model {

    protected $table = 'room_user';
    protected $fillable = ['user_id', 'room_id'];

    public static function defineRelationship($user, $room) {
        if (UserByRoom::notHosting($room, $user)) {
            $room->users()->save($user);
        }
    }

    public static function notHosting($room, $user) {
        UserByRoom::where(['user_id' => $user->id, 'room_id' => $room->id])->get()->isEmpty();
    }
}