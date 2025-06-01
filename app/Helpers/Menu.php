<?php

namespace App\Helpers;

use Illuminate\Support\Collection;

class Menu
{

    public static function main(): Collection
    {
        $items = [
            [
                'name' => 'Home',
                'route' => 'home',
                'active'=> 'home',
            ],
            [
                'name' => 'About Us',
                'route' => 'about-us',
                'active'=> 'about-us',
            ],
            [
                'name' => 'Categories',
                'route' => 'about-us',
                'active'=> 'about-us',
            ],
            [
                'name' => 'Crypto Prices',
                'route' => 'about-us',
                'active'=> 'about-us',
            ],
            [
                'name' => 'Tools',
                'route' => 'about-us',
                'active'=> 'about-us',
            ],
            [
                'name' => 'Contact Us',
                'route' => 'about-us',
                'active'=> 'about-us',
            ],
        ];

        return collect($items)->map(function ($item) {
            return (object)$item;
        });

    }

}
