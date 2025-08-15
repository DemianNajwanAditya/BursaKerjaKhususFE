<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
            ],
            [
                'name' => 'asep',
                'email' => 'asep@example.com',
                'password' => Hash::make('asep123'),
                'role' => 'user',
            ],
            [
                'name' => 'company',
                'email' => 'company@example.com',
                'password' => Hash::make('company'),
                'role' => 'user',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}
