<?php

namespace Modules\Statistics\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        $this->mapApiRoutes();
    }

    protected function mapApiRoutes(): void
    {
        Route::prefix('api/agent/statistics')
            ->name('api.agent.statistics.')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(__DIR__.'/../Routes/api.php');
    }
}
