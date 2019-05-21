<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Lottery as Lot;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $lott_count = Lot::count();
        View::share('lott_count', $lott_count);
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
