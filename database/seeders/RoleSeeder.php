<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\{Permission, Role};

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['admin', 'user', 'guest'] as $role) {
            Role::create(['name' => $role]);
        }
        Role::findByName('admin')->syncPermissions(Permission::all());
    }
}
