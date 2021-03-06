<?php

namespace App\Providers;

use App\Observers\PlanObserver;
use App\Models\Plan;
use Illuminate\Pagination\Paginator;
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
       // Usar boostrap na pagiação
        Plan::observe(PlanObserver::class);
        Paginator::useBootstrap();
    }
}
