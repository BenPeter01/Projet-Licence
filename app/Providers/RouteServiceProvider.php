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
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            // Routes pour les offres d'emploi
            Route::get('/jobs', [JobController::class, 'index']);
            Route::post('/jobs', [JobController::class, 'store'])->middleware('auth:api');
            Route::get('/jobs/{id}', [JobController::class, 'show']);
            Route::put('/jobs/{id}', [JobController::class, 'update'])->middleware('auth:api');
            Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->middleware('auth:api');

            // Routes pour les candidatures
            Route::get('/applications', [ApplicationController::class, 'index']);
            Route::post('/applications', [ApplicationController::class, 'store']);
            Route::get('/applications/{id}', [ApplicationController::class, 'show'])->middleware('auth:api');
            Route::put('/applications/{id}', [ApplicationController::class, 'update'])->middleware('auth:api');
            Route::delete('/applications/{id}', [ApplicationController::class, 'destroy'])->middleware('auth:api');
        });
    }
}