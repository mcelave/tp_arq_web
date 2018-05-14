<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class RoomController extends Controller {

    public function mainRoom(Request $request) {
        $room = Room::mainRoom();
        $user = User::named($request['name']);
        $channelName = "room_channel_".$room->id;

        $room->host($user);
        return view('room', compact('room', 'user', 'channelName'));
    }

    public function sendMessage(Request $request) {
        $pusher = App::make('pusher');
        $pusher->trigger($request['channelName'], 'client-notify-message',
            array('message' => $request['message'], 'user' => $request['user']));
    }

    public function sendImage(Request $request) {
        $user = $request['user'];
        $image = $request['image'];
        $extension = $request['extension'];
        $channelName = $request['channelName'];

        $pusher = App::make('pusher');
        $uploadDir = public_path().'/img/';
        $uniqueIDAndExtension = uniqid().'.'.$extension;
        $output_file = $uploadDir.$uniqueIDAndExtension;
         
        $ifp = fopen($output_file, 'wb');
        $data = explode(',', $image);
        fwrite($ifp, base64_decode($data[1]));
        fclose($ifp);

        $pusher->trigger($channelName, 'client-notify-image',
            array('image' => $uniqueIDAndExtension, 'user' => $user));
    }

    public function showAllUsers($thisUserId) {
        $thisUser = User::find($thisUserId);
        return view('allUsers',['users' => User::allUsers(), 'thisUser' => $thisUser]);
    }

    public static function openPrivateChat($firstUser, $secondUser) {
        $private = function ($room) { 
            return $room['private'];
        };

        $firstUserPrivateRooms = $firstUser-> rooms()-> get()-> filter($private);

        foreach ($firstUserPrivateRooms as $privateRoom) {
            if ($privateRoom-> users()-> get()-> contains('id', $secondUser->id)) {
                return view('room', [
                    'room' => $privateRoom,
                    'user' => $firstUser,
                    'channelName' => "room_channel_".$privateRoom->id
                ]);
            }
        }
    
        return RoomController::create($firstUser, [$firstUser, $secondUser], true, 'Sala Privada');
    }

    private static function create($user, $members, $private, $roomName) {
        $room = Room::definedBy($roomName, $members, $private);

        return view('room', [
            'room'=> $room,
            'user' => $user,
            'channelName' => "room_channel_".$room->id
        ]);
    }
}
