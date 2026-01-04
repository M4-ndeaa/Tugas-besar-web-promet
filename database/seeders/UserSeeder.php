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
            'name' => 'DeaAdmin',
            'email' => 'deaadminc@gmail.com',
            'password' => Hash::make('DeaCantikSlayy'),
            'status' => 'approve',
            'role_id' => 1,
        ]);
    }
}
