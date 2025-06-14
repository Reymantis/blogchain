<?php

namespace App\Filament\Resources\AdminPostResource\Pages;

use App\Filament\Resources\AdminPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdminPosts extends ListRecords
{
    protected static string $resource = AdminPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
