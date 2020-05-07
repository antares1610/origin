<?php

namespace Antares1610\Origin\Providers;

use Illuminate\Support\ServiceProvider;

class OriginServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    	//
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->publishes([
        	__DIR__ . '/../publishes/routes' 	=> base_path('routes'),
        	__DIR__ . '/../publishes/views' 	=> resource_path('views'),
        	__DIR__ . '/../publishes/app' 		=> app_path(),
        	__DIR__ . '/../publishes/database' 	=> database_path()
        ]);
    }
}
