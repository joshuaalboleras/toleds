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
        //
        User::insert([
            ["role_id" => 1, "name" => "Romwel Bayona", "email" => "romwel@gmail.com", "password" => Hash::make("admin12345")],
            ["role_id" => 2, "name" => "Joshua Alboleras", "email" => "albolerasjoshua@gmail.com", "password" => Hash::make("admin12345")],
            ["role_id" => 2, "name" => "Shine Montejo", "email" => "montejo@gmail.com", "password" => Hash::make("admin12345")],
        ]);
    }
}
