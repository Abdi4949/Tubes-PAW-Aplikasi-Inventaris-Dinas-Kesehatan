<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Kelompok3@Admin",
            "email" => "admin@admin.com",
            "password" => "1234",
            'role' => 'admin',
        ]);
        User::create([
            "name" => "Kelompok3@User",
            "email" => "user@admin.com",
            "password" => "12345",
            'role' => 'user',
        ]);

    }
}
