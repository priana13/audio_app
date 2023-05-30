<?php

namespace App\Filament\Resources\GendreResource\Pages;

use App\Filament\Resources\GendreResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGendre extends EditRecord
{
    protected static string $resource = GendreResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
