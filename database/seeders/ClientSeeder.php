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
                'address'           => 'Egypt',
                'email_verified_at' => now(),
            ]);

        $client->assignRole('client');
        $client->media()->create([
            'name' => 'avatar',
            'path'  => 'https://ui-avatars.com/api/?name=Client&background=0D8ABC&color=fff',
            'extension' => 'png',
            'mime_type' => 'image/png',
            'size' => '100',
            'alt' => 'Client',
            'order' => '1',
        ]);
        $client->phone()->create([
            'phone' => '01000000000',
            'type' => 'mobile',
            'is_primary' => '1',
            'is_active' => '1',

        ]);
    }
}
