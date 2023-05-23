<?php

namespace App\Filament\Resources\CreatorResource\Pages;

use App\Filament\Resources\CreatorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCreators extends ListRecords
{
    protected static string $resource = CreatorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
