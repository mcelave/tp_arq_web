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
        $pusher->trigger($request['channelName'], env('PUSHER_MESSAGE_EVENT'),
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

        $pusher->trigger($channelName, env('PUSHER_IMAGE_EVENT'),
            array('image' => $uniqueIDAndExtension, 'user' => $user));
    }

    public static function openPrivateChat($firstUser, $secondUser) {
        $currentUser = User::named($firstUser);
        $otherUser = User::named($secondUser);

        $private = function ($room) {
            return $room['private'];};

        $firstUserPrivateRooms = $currentUser->rooms()->get()->filter($private);
        foreach ($firstUserPrivateRooms as $privateRoom) {
            if ($privateRoom->users()->get()->contains('id', $otherUser->id)) {
                return view('room', [
                    'room' => $privateRoom,
                    'user' => $currentUser,
                    'channelName' => "room_channel_".$privateRoom->id
                ]);
            }
        }
        return RoomController::create($currentUser, collect([$currentUser, $otherUser]), true, 'Sala Privada');
    }

    public static function openPublicChat(Request $request) {
        $user = User::named($request['user']);
        $members = collect($request['members'])->map(function ($memberName, $key) {
            return User::named($memberName);});
        return RoomController::create($user, $members, false, $request['name']);
    }

    private static function create($user, $members, $private, $roomName) {
        $room = Room::definedBy($roomName, $members, $private);
        return view('room', [
            'room'=> $room,
            'user' => $user,
            'channelName' => "room_channel_".$room->id
        ]);
    }

    public function showAll($userName) {
        $user = User::named($userName);
        $rooms = Room::where(['private' => false])->get();
        return view('allGroups', compact('rooms', 'user'));
    }

    public function join($roomName, $userName) {
        $user = User::named($userName);
        $room = Room::named($roomName);
        $room->host($user);
        return view('room', [
            'room'=> $room,
            'user' => $user,
            'channelName' => "room_channel_".$room->id
        ]);
    }

    public function createPublicChat($userName) {
        $currentUser = User::named($userName);
        $users = User::all();
        return view('createPublicRoom', [
            'user' => $currentUser,
            'users' => $users
        ]);
    }
}
