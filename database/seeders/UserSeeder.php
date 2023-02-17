<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'              => 'Admin',
            'email'             => 'admin@algypt.com',
            'password'          => Hash::make('admin'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);

        $user->assignRole('admin');
    }
}
