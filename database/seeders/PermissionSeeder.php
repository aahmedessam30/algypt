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
                return !in_array(in_array(explode('.', $route)[0], ['admin', 'api']) ? explode('.', $route)[1] : explode('.', $route)[0],
                    ['auth', 'sanctum', 'password', 'verification', 'login', 'register', 'logout', 'ignition', 'verify-email', 'resend-verification-email', 'reset-password']);
            })
            ->map(function ($route) {
                $prefix = Route::getRoutes()->getByName($route)->getAction('prefix');
                $prefix = str_contains($prefix, '/') ? explode('/', $prefix)[0] : $prefix;
                return str_replace(array("$prefix.", '.'), array('', '_'), $route) . ($prefix === 'admin' ? '_admin' : '_client');
            })
            ->each(function ($route) {
                Permission::create(['name' => implode('_', array_slice(explode('_', $route), 0, -1)), 'guard_name' => last(explode('_', $route))]);
            });
    }
}
