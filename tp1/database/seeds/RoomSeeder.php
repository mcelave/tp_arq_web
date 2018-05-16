<?php

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder {

    public function run() {
        Room::create(['name' => 'Lobby principal', 'private' => false]);
        Room::create(['name' => 'Haciendo el tp...', 'private' => true]);
    }
}
