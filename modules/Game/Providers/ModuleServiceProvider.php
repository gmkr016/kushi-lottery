<?php

namespace Modules\Game\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Game\Services\GameService;
use Modules\Game\Services\Interfaces\IGameService;
use Modules\Game\Services\Interfaces\ILotteryNumberService;
use Modules\Game\Services\Interfaces\ITicketService;
use Modules\Game\Services\LotteryNumberService;
use Modules\Game\Services\TicketService;

class ModuleServiceProvider extends ServiceProvider
{
    public array $singletons = [
        IGameService::class => GameService::class,
        ITicketService::class => TicketService::class,
        ILotteryNumberService::class => LotteryNumberService::class,
    ];

    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->app->register(RouteServiceProvider::class);
    }
}
