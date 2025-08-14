<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Tambahkan lebih dari satu user agar user_id di seeder lain valid
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin', // tambahkan role admin
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user', // tambahkan role user
        ]);
        User::create([
            'name' => 'asep',
            'email' => 'asep@example.com',
            'password' => Hash::make('asep123'),
            'role' => 'user', // tambahkan role user
        ]);
        User::create([
            'name' => 'company',
            'email' => 'company@example.com',
            'password' => Hash::make('company'),
            'role' => 'user', // tambahkan role user
        ]);
    }
}