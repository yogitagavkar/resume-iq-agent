<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FastApiClientService;
use App\Services\ResumeAgentService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            FastApiClientService::class,
            fn () => new FastApiClientService()
        );

        $this->app->singleton(
            ResumeAgentService::class,
            fn ($app) => new ResumeAgentService(
                $app->make(FastApiClientService::class)
            )
        );
    }

    public function boot(): void
    {
        //
    }
}