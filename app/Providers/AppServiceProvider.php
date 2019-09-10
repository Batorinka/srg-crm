<?php

namespace App\Providers;

use App\Models\Gsobject;
use App\Models\MainContract;
use App\Observers\GsobjectObserver;
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
        Gsobject::observe(GsobjectObserver::class);
    }
}
