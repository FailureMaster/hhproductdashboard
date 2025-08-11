<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'role'          => 1,
            'first_name'    => 'mike',
            'last_name'     => 'machane',
            'email'         => 'mikem.cwd@gmail.com',
            'password'      => 'Merchandise_2025',
        ]);

    }
}
