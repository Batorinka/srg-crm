<?php

namespace App\Providers;

use App\Models\MainContract;
use App\Observers\MainContractObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        MainContract::observe(MainContractObserver::class);
    }
}
