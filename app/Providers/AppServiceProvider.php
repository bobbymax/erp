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

        view()->composer('layouts.contact', function($view) {
            $view->with('users', json_encode(\App\User::orderBy('name', 'ASC')->get()));
        });

        view()->composer('layouts.contact', function($view) {
            $view->with('groups', \App\Group::latest()->get());
        });

        view()->composer('partials.updated.header', function($view) {
            $view->with('modules', \App\Module::latest()->get());
        });
    }
}
