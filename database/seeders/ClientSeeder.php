<?php

namespace Database\Seeders;

use App\Models\V1\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = Client::create([
                'name'              => 'Client',
                'email'             => 'client@algypt.com',
                'password'          => Hash::make('client'),
                'email_verified_at' => now(),
                'remember_token'    => Str::random(10),
            ]);

        $client->assignRole('client');
    }
}
