<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        //Public routes
        $this->mapPublicRoutes();

        //Guest rotes only
        $this->mapGuestRoutes();

        //authenticated user routes
        $this->mapAuthRoutes();

        //authenticated user routes
        $this->mapAdminRoutes();
        //
    }

    /**
     * Define the "public " routes for the application.
     * @return void
     */
    protected function mapPublicRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/public.php');
        });
    }

    /**
     * Define the "guest" routes for the application.
     * Anonymous user into the system
     *
     * @return void
     */
    protected function mapGuestRoutes()
    {
        Route::group([
            'middleware' => ['web','guest'],
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/guest.php');
        });
    }


    /**
     * Define the "authenticated" routes for the application.
     *
     *
     * @return void
     */
    protected function mapAuthRoutes()
    {
        Route::group([
            'middleware' => ['web','auth'],
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/auth.php');
        });
    }

    /**
     * Define the "admin" routes for the application.
     *
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::group([
            'middleware' => [ 'web', 'auth', 'admin'],
            'namespace' => $this->namespace,
            'prefix' => 'admin',
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }


    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}
