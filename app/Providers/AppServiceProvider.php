<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Massage;
use App\Observers\MassageObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Massage::observe(MassageObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
