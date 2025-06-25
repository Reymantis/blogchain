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
            return cache()->remember('categories.all', config('cache.time_to_live'), function () {
                return Category::withCount(['posts', 'children'])->orderBy('order_column', 'asc')->get();
            });
        });

        view()->composer('*', function ($view) {
            $view->with('categories', app('categories'));
        });
    }
}
