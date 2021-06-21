<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Admin User',
            'email' => 'mwangithegreat@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('temporary-password-that-must-be-changed'), // password
        ]);

        User::factory()->student()->create();
        User::factory()->writer()->create();
    }
}
