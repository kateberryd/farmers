<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RedemptionCenterTruckServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\RedemptionCenterTruck\RedemptionCenterTruckContract', 'App\Repositories\RedemptionCenterTruck\EloquentRedemptionCenterTruckRepository');
    }
}
