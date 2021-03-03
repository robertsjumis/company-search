<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Services\FetchDataService;

class FetchDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FetchDataService::class, function ($app) {
            return new FetchDataService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
