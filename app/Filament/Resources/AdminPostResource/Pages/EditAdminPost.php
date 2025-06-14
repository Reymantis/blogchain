<?php

namespace App\Filament\Resources\AdminPostResource\Pages;

use App\Filament\Resources\AdminPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdminPost extends EditRecord
{
    protected static string $resource = AdminPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
