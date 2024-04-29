<?php

namespace Irish\Ecom\Providers;

use Illuminate\Support\ServiceProvider;

class EcommerceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->register(FortifyServiceProvider::class);
    }

    /**
     * Bootstrap services.s
     */
    public function boot(): void
    {
        //
         // Load migrations
         $this->loadMigrationsFrom(__DIR__.'/../database/migration');

         // Load routes
         $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
 
         // Load views
         $this->loadViewsFrom(__DIR__.'/../views', 'ecom');
         $this->loadViewsFrom(__DIR__.'/../views/post', 'post');
         $this->loadViewsFrom(__DIR__.'/../views/auth', 'auth');
         $this->loadViewsFrom(__DIR__.'/../views/layout', 'layout');
 
         // Publish public assets
         $this->publishes([
             __DIR__.'/../public/ecom/products' => public_path('vendor/ecom/products'),
         ], 'public');
 
         // Merge and publish Fortify configuration
         $this->mergeConfigFrom(__DIR__.'/../config/fortify.php', 'fortify');
         $this->publishes([
             __DIR__.'/../config/fortify.php' => config_path('fortify.php'),
         ], 'fortify-config');
        
    }
}
