<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('subscribed', function(){
            return auth()->user()->hasSubscription();
        });

        Blade::if('notsubscribed', function(){
            return !auth()->check() || auth()->user()->doesNotHaveSubscription();
        });

        Blade::if('subscriptioncancelled', function(){
            return auth()->user()->hasCancelled();
        });

        Blade::if('subscriptionnotcancelled', function(){
            return auth()->user()->hasNotCancelled();
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
