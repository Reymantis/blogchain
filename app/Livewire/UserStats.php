<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStats extends BaseWidget
{

    public ?User $user = null;

    protected function getStats(): array
    {
        return [
            Stat::make('Post Active', $this->user->posts_count),

//            Stat::make('Bounce rate', '21%')
//                ->description('7% increase')
//                ->descriptionIcon('heroicon-m-arrow-trending-down')
//                ->color('danger'),
//
//            Stat::make('Average time on page', '3:12')
//                ->description('3% increase')
//                ->descriptionIcon('heroicon-m-arrow-trending-up')
//                ->color('success'),
        ];
    }
}
