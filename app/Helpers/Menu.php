<?php

namespace App\Helpers;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class Menu
{

    public static function main(): Collection
    {
        $items = [
            [
                'name' => 'Home',
                'route' => 'home',
                'active' => 'home',
                'children' => null
            ],
            [
                'name' => 'Categories',
                'route' => 'about-us',
                'active' => 'about-us',
                'children' => $category = Cache::remember('top-nav-categories', 120, function () {
                    return Category::live()->get()->map(function ($category) {
                        return [
                            'id' => $category->id,
                            'name' => $category->name,
                            'slug' => $category->slug
                        ];
                    });
                })
            ],
            [
                'name' => 'About Us',
                'route' => 'about-us',
                'active' => 'about-us',
                'children' => null
            ],
            [
                'name' => 'Contact Us',
                'route' => 'about-us',
                'active' => 'about-us',
                'children' => null
            ],
        ];

        return collect($items)->map(function ($item) {
            return (object)$item;
        });

    }

}
