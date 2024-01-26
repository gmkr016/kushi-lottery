<?php

namespace Modules\Game\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Game\Services\GameService;
use Modules\Game\Services\Interfaces\InterfaceGameService;
use Modules\Game\Services\Interfaces\InterfaceLotteryNumberService;
use Modules\Game\Services\Interfaces\InterfaceTicketService;
use Modules\Game\Services\LotteryNumberService;
use Modules\Game\Services\TicketService;

class ModuleServiceProvider extends ServiceProvider
{
    public array $singletons = [
        InterfaceGameService::class => GameService::class,
        InterfaceTicketService::class => TicketService::class,
        InterfaceLotteryNumberService::class => LotteryNumberService::class,
    ];

    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->app->register(RouteServiceProvider::class);
    }
}
