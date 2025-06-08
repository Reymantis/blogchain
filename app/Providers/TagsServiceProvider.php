<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Tags\Tag;

class TagsServiceProvider extends ServiceProvider
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
        $this->app->singleton('tags', function () {
            return cache()->remember('tags.all', config('cache.time_to_live'), function () {
                return Tag::get();
            });
        });

        view()->composer('*', function ($view) {
            $view->with('tags', app('tags'));
        });
    }
}
