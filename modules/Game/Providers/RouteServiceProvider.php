<?php

namespace Modules\Game\Providers;

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
        Route::prefix('api/agent/games')
            ->name('api.agent.games.')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(__DIR__.'/../Routes/game.php');

        Route::prefix('api/agent/tickets')
            ->name('api.agent.tickets.')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(__DIR__.'/../Routes/ticket.php');
    }
}
