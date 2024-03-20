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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'super_administrator'
        ]);

        User::create([
            'name' => 'Kawasan I',
            'email' => 'kawasan1@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'administrator'
        ]);

        User::create([
            'name' => 'Kawasan II',
            'email' => 'kawasan2@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'administrator'
        ]);

        User::create([
            'name' => 'Kawasan III',
            'email' => 'kawasan3@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'administrator'
        ]);

        User::create([
            'name' => 'Member',
            'email' => 'member@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'member'
        ]);
    }
}
