<?php

namespace App\Filament\Resources\AdminPostResource\Pages;

use App\Filament\Resources\AdminPostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAdminPost extends CreateRecord
{
    protected static string $resource = AdminPostResource::class;
}
