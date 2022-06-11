<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            "name" => "Admin User",
            "email" => "admin@user.com",
            "role" => "admin",
            "password" => Hash::make("password"),
        ]);
        \App\Models\User::factory()->create([
            "name" => "Client User",
            "email" => "client@user.com",
            "role" => "client",
            "password" => Hash::make("password"),
        ]);
        \App\Models\User::factory()->create([
            "name" => "Normal User",
            "email" => "user@user.com",
            "role" => "user",
            "password" => Hash::make("password"),
        ]);
    }
}
