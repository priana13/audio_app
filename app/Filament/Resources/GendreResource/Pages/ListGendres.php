<?php

namespace App\Filament\Resources\GendreResource\Pages;

use App\Filament\Resources\GendreResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGendres extends ListRecords
{
    protected static string $resource = GendreResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
