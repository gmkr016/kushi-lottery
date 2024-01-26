<?php

namespace App\Providers;

use App\Models\LotteryCategory as LottCat;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('lottery_categories') && class_exists(LottCat::class)) {
            $currentDate = Carbon::now()->toDateTimeString(); // yyyy-mm-dd hh:mm:ss
            $unix_cd = strtotime($currentDate); //1561959211
            $recentCat = LottCat::where('draw_date', '>=', $unix_cd)->get();
            $archiveCat = LottCat::where('draw_date', '<', $unix_cd)->get();
            View::share('recenthistory', $recentCat);
            View::share('archivehistory', $archiveCat);
        }
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFour();
        $this->makeMicros();
    }

    private function makeMicros(): void
    {
        Response::macro('success', function ($payloads) {
            $code = Arr::has($payloads, ['code']) ? $payloads['code'] : 200;

            return Response::json([
                'status' => true,
                'data' => $payloads['data'],
                'code' => $code,
            ]);
        });

        Response::macro('fail', function ($payloads) {
            $code = (! Arr::has($payloads, ['code']) || $payloads['code'] == 0) ? 400 : $payloads['code'];

            return Response::json([
                'status' => false,
                'data' => $payloads['data'],
                'code' => $code,
            ]);
        });
    }
}
