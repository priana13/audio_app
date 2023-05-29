<?php

namespace App\Filament\Resources\MusicResource\Pages;

use App\Filament\Resources\MusicResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMusic extends CreateRecord
{
    protected static string $resource = MusicResource::class;

    protected static string $view = 'filament.resources.music.create-user';
}
