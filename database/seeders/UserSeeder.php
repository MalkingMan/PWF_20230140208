<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'              => 'Admin',
            'email'             => 'admin@example.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
        ]);

        User::create([
            'name'              => 'Array',
            'email'             => 'Array@example.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
        ]);

        User::create([
            'name'              => 'Siti Rahayu',
            'email'             => 'siti@example.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
        ]);
    }
}
