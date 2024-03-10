<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\PropertyDetail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this -> app -> bind('path.public', function()
{
        return base_path('public_html');
});
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
// Share $properties variable with all views within the frontend namespace
View::composer('frontend.*', function ($view) {
    $properties = PropertyDetail::all();
    $view->with('properties', $properties);
});
    }
}
