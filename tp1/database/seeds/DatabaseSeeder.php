<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {
        $this->truncateTables([
            'users',
            'rooms',
            'room_user'
        ]);

        $this->call(UserSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(UsersByRoomSeeder::class);
    }

    public function truncateTables(array $tables) {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
