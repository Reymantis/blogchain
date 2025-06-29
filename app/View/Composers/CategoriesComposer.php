<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CategoriesComposer
{
    protected Collection $categories;

    public function __construct()
    {
        // Cache the categories here instead of in Menu class
        $this->categories = Cache::remember('categories', config('cache.time_to_live'), function () {
            return Category::live()->with('children')->withCount('children')->get();
        });

        // Share globally so Menu class can access it
        view()->share('categories', $this->categories);
    }

    public static function getCategories(): Collection
    {
        return Cache::remember('categories', config('cache.time_to_live'), function () {
            return Category::live()->with('children')->withCount('children')->get();
        });
    }

    // Static method to get categories for other classes

    public function compose(View $view): void
    {
        $view->with('categories', $this->categories);
    }
}
