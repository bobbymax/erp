<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.sidebar', function($view) {
            $view->with('modules', \App\Module::latest()->get());
        });

        view()->composer('partials.updated.header', function($view) {
            $view->with('modules', \App\Module::latest()->get());
        });

        view()->composer('pages.dashboard', function($view) {
            $dt = \Carbon\Carbon::now();
            $view->with('tickets', \App\Ticket::where('created_at', $dt->isToday())->get());
        });
    }
}
