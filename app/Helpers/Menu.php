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
                'children' => null,
            ],
            [
                'name' => 'Categories',
                'route' => 'categories.index',
                'active' => 'categories/*',
                'children' => CategoriesComposer::getCategories()
                    ->whereNull('parent_id') // Assuming root categories
                    ->map(function ($category) {
                        return [
                            'id' => $category->id,
                            'name' => $category->name,
                            'slug' => $category->slug,
                            'route' => 'categories.show',
                            'active' => 'categories.show',
                            'children_count' => $category->children_count,
                        ];
                    }),
            ],
            [
                'name' => 'Contributors',
                'route' => 'users.index',
                'active' => 'users.index',
                'children' => null,
            ],
            [
                'name' => 'About Us',
                'route' => 'about-us',
                'active' => 'about-us',
                'children' => null,
            ],
            [
                'name' => 'Contact Us',
                'route' => 'contact-us',
                'active' => 'contact-us',
                'children' => null,
            ],
        ];

        return static::colletor($items);
    }

    protected static function colletor($items): Collection
    {
        return collect($items)->map(function ($item) {
            return (object) $item;
        });
    }

    public static function legal(): Collection
    {
        $items = [
            [
                'name' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'route' => 'privacy-policy',
            ],
            [
                'name' => 'Terms of Service',
                'slug' => 'terms-of-service',
                'route' => 'home',
            ],
            [
                'name' => 'Cookie Policy',
                'slug' => 'cookie-policy',
                'route' => 'home',
            ],
            [
                'name' => 'User Data',
                'slug' => 'user-data',
                'route' => 'home',
            ],

        ];

        return static::colletor($items);
    }

    public static function social(): Collection
    {

        $items = collect(config('social'));

        return static::colletor($items);
    }

    public static function auth(): Collection
    {
        $items = [
            [
                'name' => 'Login',
                'route' => 'admin.login',
                'active' => 'admin.login',
            ],
            [
                'name' => 'Register',
                'route' => 'admin.register',
                'active' => 'admin.register',
            ],
        ];

        return static::colletor($items);
    }

    public static function sub(): Collection
    {
        $items = [
            [
                'name' => 'Write a Article',
                'route' => 'admin.dashboard',
                'active' => 'admin.dashboard',
            ],
        ];

        return static::colletor($items);
    }
}
