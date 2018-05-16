<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

    public function run() {
        User::definedBy('ezePuerta', 28,'CABA');
        User::definedby('martinCelave', 25, 'SAM');
        User::definedBy('tinchoFosco', 24, 'LONDRES');
        User::definedBy('tomoChibana', 24, 'JAPON');
        User::definedBy('espia', 99, 'NEVERLAND');
    }
}
