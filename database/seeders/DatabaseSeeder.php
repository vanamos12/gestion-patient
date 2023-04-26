<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

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
            'name' => 'Virginie',
            'email' => 'virginie@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('virginie12'),
            'remember_token' => Str::random(10),
        ]);
    }
}
