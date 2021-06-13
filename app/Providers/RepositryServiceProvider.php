<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\NewsRepositryInterface',
            'App\Http\Eloquent\NewsRepositry'
        );
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
