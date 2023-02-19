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
        foreach (['admin', 'client'] as $role) {
            Role::create(['name' => $role, 'guard_name' => $role])->syncPermissions(Permission::whereGuardName($role)->get());
        }
    }
}
