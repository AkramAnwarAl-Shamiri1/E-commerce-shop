<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Seed an admin user and some regular users
        User::factory()->count(10)->create();
    }
}
