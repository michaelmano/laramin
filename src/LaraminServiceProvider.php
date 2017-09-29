<?php

namespace Michaelmano\Laramin;

use Illuminate\Support\ServiceProvider;

class LaraminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'laramin');
        $this->publishes([
            __DIR__.'/assets' => public_path('michaelmano/laramin'),
        ], 'public');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Michaelmano\Laramin\LaraminController');
    }
}
