<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Observers\CategoryObserver;
use App\Observers\PostObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class ObserverProvider extends ServiceProvider
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
        User::observe(UserObserver::class);

        Category::observe(CategoryObserver::class);

        Post::observe(PostObserver::class);
    }
}
