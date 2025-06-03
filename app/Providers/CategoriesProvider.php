<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class CategoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton('categories', function () {
            return cache()->remember('categories.all', 3600, function () {
                return Category::withCount(['posts', 'children'])->get();
            });
        });

        view()->composer('*', function ($view) {
            $view->with('categories', app('categories'));
        });
    }
}
