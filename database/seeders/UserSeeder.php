<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
     {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@pwa.rs',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@pwa.rs',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        User::create([
            'name' => 'Editor',
            'email' => 'editor@pwa.rs',
            'password' => Hash::make('password'),
            'role_id' => 3,
        ]);
        User::create([
            'name' => 'User 2',
            'email' => 'user2@user.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        User::create([
            'name' => 'User 3',
            'email' => 'user3@user.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        User::create([
            'name' => 'User 4',
            'email' => 'user4@user.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        User::create([
            'name' => 'User 5',
            'email' => 'user5@user.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
    }
}
