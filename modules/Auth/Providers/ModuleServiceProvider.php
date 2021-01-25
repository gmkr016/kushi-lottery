<?php

namespace Modules\Auth\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        parent::register();
        $this->app->register(RouteServiceProvider::class);
    }
}
