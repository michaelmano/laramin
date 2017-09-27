<?php

namespace Michaelmano\Laramin;

use Illuminate\Support\ServiceProvider;

class LaraminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'laramin');
        $this->publishes([
            __DIR__.'/assets' => public_path('michaelmano/laramin'),
            __DIR__.'/config/laramin.php' => config_path('laramin.php'),
        ], 'public');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Michaelmano\Laramin\LaraminController');
    }
}
