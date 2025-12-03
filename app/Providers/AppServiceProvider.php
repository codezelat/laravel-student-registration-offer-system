<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Barryvdh\DomPDF\Facade\Pdf;

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
        if ($this->app->environment('local')) {
            $this->app->register(\Barryvdh\DomPDF\ServiceProvider::class);
        }
        
        // Register PDF alias
        $this->app->alias('PDF', \Barryvdh\DomPDF\Facade\Pdf::class);
    }
}
