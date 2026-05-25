<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'username' => 'mnoor',
            'email' => 'admin@mnoor.com',
            'password' => Hash::make('mnoor'),
            'role' => 'admin',
        ]);

        // Create regular user
        User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@mnoor.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
