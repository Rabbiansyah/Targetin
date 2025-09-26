<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Goal;
use App\Observers\GoalObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Goal::observe(GoalObserver::class);
    }
}
