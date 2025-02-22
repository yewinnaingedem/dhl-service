<?php

namespace Gmbf\Dhlservice;

use Gmbf\DhlService\Service\DhlService ;
use Illuminate\Support\ServiceProvider;

class DhlServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register config
        $this->mergeConfigFrom(__DIR__.'/Config/dhl.php', 'dhl');

        $this->app->singleton(DhlService::class, function ($app) {
            return new DhlService();
        });
    }

    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__.'/Config/dhl.php' => config_path('dhl.php'),
        ], 'config');
    }
}
