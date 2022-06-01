<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@umax.agency',
            'password' => Hash::make('admin'),
            'role' => 666,
        ]);

        User::create([
            'name' => 'User',
            'email' => 'email@email.ru',
            'password' => Hash::make('user'),
            'role' => 1,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
