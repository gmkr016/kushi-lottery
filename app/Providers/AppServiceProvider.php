<?php

namespace App\Providers;

use App\LotteryCategory as LottCat;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
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
        $currentDate = \Carbon\Carbon::now()->toDateTimeString(); // yyyy-mm-dd hh:mm:ss
        $unix_cd = strtotime($currentDate); //1561959211
        $recentCat = LottCat::where('draw_date', '>=', $unix_cd)->get();
        $archiveCat = LottCat::where('draw_date', '<', $unix_cd)->get();
        View::share('recenthistory', $recentCat);
        View::share('archivehistory', $archiveCat);

        Schema::defaultStringLength(191);
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
