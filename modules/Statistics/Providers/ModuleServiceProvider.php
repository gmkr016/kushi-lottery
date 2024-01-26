<?php

namespace Modules\Statistics\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Statistics\Services\Interfaces\InterfaceStatisticService;
use Modules\Statistics\Services\StatisticService;

class ModuleServiceProvider extends ServiceProvider
{
    public array $singletons = [
        InterfaceStatisticService::class => StatisticService::class,
    ];

    public function register(): void
    {
        parent::register();
        $this->app->register(RouteServiceProvider::class);
    }
}
