<?php

namespace App\Providers;

use DB;
use Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Schema::defaultStringLength(191);
        Paginator::defaultView('vendor.pagination.default');
        DB::statement("SET lc_time_names = 'es_ES'");

        view()->composer('*', function ($view) {
            $view->with('active_route', \Route::currentRouteName());
        });
    }
}
