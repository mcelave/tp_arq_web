<?php

use App\Models\User;
use App\Models\Room;
use App\Models\UserByRoom;
use Illuminate\Database\Seeder;

class UsersByRoomSeeder extends Seeder {

    public function run() {

        $ezePuerta = User::named('ezePuerta')->value('id');
        $martinCelave = User::named('martinCelave')->value('id');
        $tinchoFosco = User::named('tinchoFosco')->value('id');
        $tomoChibana = User::named('tomoChibana')->value('id');
        $espia = User::named('espia')->value('id');

        $publicRoom = Room::where('private', false)->value('id');
        $privateRoom = Room::where('private', true)->value('id');

        UserByRoom::create(['user_id' => $ezePuerta, 'room_id' => $publicRoom]);
        UserByRoom::create(['user_id' => $martinCelave, 'room_id' => $publicRoom]);
        UserByRoom::create(['user_id' => $tinchoFosco, 'room_id' => $publicRoom]);
        UserByRoom::create(['user_id' => $tomoChibana, 'room_id' => $publicRoom]);
        UserByRoom::create(['user_id' => $espia, 'room_id' => $publicRoom]);

        UserByRoom::create(['user_id' => $ezePuerta, 'room_id' => $privateRoom]);
        UserByRoom::create(['user_id' => $martinCelave, 'room_id' => $privateRoom]);
        UserByRoom::create(['user_id' => $tinchoFosco, 'room_id' => $privateRoom]);
        UserByRoom::create(['user_id' => $tomoChibana, 'room_id' => $privateRoom]);
    }
}
