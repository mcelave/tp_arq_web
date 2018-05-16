<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserByRoom extends Model {

    protected $table = 'room_user';
    protected $fillable = ['user_id', 'room_id'];

    public static function defineRelationship($user, $room) {
        $room->users()->save($user);
    }
}