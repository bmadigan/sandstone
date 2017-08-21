<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CustomBladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Sample:  @public  then display to anyone  @endpublic
        Blade::if('public', function () {
            return ! auth()->check();
        });

        // Sample:   @env('production') then echo out analytics.js @endenv
        Blade::if('env', function ($env) {
            return app()->environment($env);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
