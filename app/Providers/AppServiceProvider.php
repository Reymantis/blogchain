<?php

namespace App\Providers;



use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Blade::anonymousComponentPath('');



//        Filament::registerNavigationGroups([
//            'Admin',
//            'Blog',
//            'Settings',
//        ]);
//
//        Filament::serving(function () {
//            Filament::registerNavigationItems([
//                NavigationItem::make('Analytics')
//                    ->url('https://filament.pirsch.io', shouldOpenInNewTab: true)
//                    ->icon('heroicon-o-presentation-chart-line')
//                    ->activeIcon('heroicon-s-presentation-chart-line')
//                    ->group('Reports')
//                    ->sort(3),
//            ]);
//        });
    }
}
