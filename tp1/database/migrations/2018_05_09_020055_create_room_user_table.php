<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Room;

class CreateRoomUserTable extends Migration {

    public function up() {
        Schema::create('room_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('room_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('room_id')->references('id')->on('rooms');
        });

        Room::createMainRoom();
    }

    public function down() {
        Schema::dropIfExists('users_by_room');
    }
}