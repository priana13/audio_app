<?php

namespace App\Filament\Resources\CreatorResource\Pages;

use App\Filament\Resources\CreatorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCreator extends EditRecord
{
    protected static string $resource = CreatorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
