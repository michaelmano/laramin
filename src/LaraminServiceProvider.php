<?php

namespace MichaelMano\Laramin;

use Illuminate\Support\ServiceProvider;

class LaraminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'laramin');
        $this->publishes([
            __DIR__ . '/assets' => public_path('michaelmano/laramin'),
        ], 'public');
        $this->publishes([__DIR__ . '/config/laramin.php' => config_path('laramin.php')]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        include __DIR__ . '/routes.php';
        $this->app->make('MichaelMano\Laramin\LaraminController');
    }
}
