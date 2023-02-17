<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(Route::getRoutes()->getRoutesByName())
            ->keys()
            ->filter(function ($route) {
                return !in_array(explode('.', $route)[0],
                    ['auth', 'sanctum', 'password', 'verification', 'login', 'register', 'logout', 'user', 'api', 'ignition']);
            })
            ->map(function ($route) {
                return str_replace('.', '_', $route);
            })
            ->each(function ($route) {
                Permission::create([
                    'name' => $route,
                ]);
            });
    }
}
