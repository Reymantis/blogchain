<?php

namespace App\Helpers;

use App\View\Composers\CategoriesComposer;
use Illuminate\Support\Collection;

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
                'route' => 'categories.index',
                'active' => 'categories.index',
                'children' => CategoriesComposer::getCategories()
                    ->whereNull('parent_id') // Assuming root categories
                    ->map(function ($category) {
                        return [
                            'id' => $category->id,
                            'name' => $category->name,
                            'slug' => $category->slug,
                            'route' => 'categories.show',
                            'active' => 'categories.show',
                        ];
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
