<?php

namespace App\Providers;

use App\Classes\ElViews;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Bouncer;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \CyrildeWit\EloquentViewable\Contracts\Views::class,
            ElViews::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Bouncer::cache();
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
    }
}
