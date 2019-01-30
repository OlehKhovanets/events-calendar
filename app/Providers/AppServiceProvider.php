<?php

namespace App\Providers;

use App\Services\Calendar\CreateCalendar;
use App\Services\Calendar\CreateCalendarInterface;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $container = Container::getInstance();
        $container->bind(CreateCalendarInterface::class, CreateCalendar::class);
    }
}
