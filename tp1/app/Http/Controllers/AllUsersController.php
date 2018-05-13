<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use Pusher\Pusher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;

class AllUsersController extends Controller
{
    public function startPrivateConversation() {
        $memberIdsString = Input::get('members');
        $memberIdsArray = explode(",", $memberIdsString);

        $getMemberFromId = function($memberId) {
            return User::find($memberId);
        };

        $members = array_map($getMemberFromId, $memberIdsArray);
        return RoomController::openPrivateChat($members[0], $members[1]);
    }
}
