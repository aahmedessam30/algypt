<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';
    public const ADMIN = '/admin';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();
        $this->routes(function () {
            $apiVersion = strtolower(str_starts_with(strtolower(request()->segment(1)), 'v')
                ? request()->segment(1)
                : config('app.api_version', 'v1'));

            // API Routes
            foreach (config("versions.$apiVersion.api") as $version) {
                Route::prefix($version['prefix'] ?? "api/$apiVersion")
                    ->as("api.")
                    ->middleware($version['middleware'] ?? 'api')
                    ->group(base_path("routes/$apiVersion/{$version['file']}.php"));
            }

            // Web Routes
            foreach (config("versions.$apiVersion.web") as $version) {
                Route::prefix($version['prefix'] ?? '')
                    ->as(isset($version['prefix']) ? "$version[prefix]." : '')
                    ->middleware($version['middleware'] ?? 'web')
                    ->group(base_path("routes/$apiVersion/{$version['file']}.php"));
            }
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
