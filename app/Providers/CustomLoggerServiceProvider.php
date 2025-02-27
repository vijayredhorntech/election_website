<?php

namespace App\Providers;

use App\Services\CustomLogger;
use Illuminate\Support\ServiceProvider;

class CustomLoggerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CustomLogger::class, function ($app) {
            return new CustomLogger();
        });
    }
}
