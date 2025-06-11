<?php

namespace App\Providers;


use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void

    {
        Schema::defaultStringLength(191);
        URL::forceHttps(config('app.force_https'));
//        Model::preventLazyLoading();

        FilamentColor::register([
            'danger' => Color::Red,
            'gray' => Color::Zinc,
            'info' => Color::Blue,
            'primary' => Color::Red,
            'success' => Color::Green,
            'warning' => Color::Amber,
        ]);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
