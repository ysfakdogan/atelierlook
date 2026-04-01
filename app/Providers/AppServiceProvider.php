<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SiteView; // 🔥 EKLE

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
        // 🔥 GLOBAL ZİYARET SAYACI
        if (!app()->runningInConsole()) {

            $view = SiteView::first();

            if ($view) {
                $view->increment('views');
            }
        }
    }
}
