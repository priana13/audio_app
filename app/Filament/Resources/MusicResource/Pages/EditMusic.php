<?php

namespace App\Filament\Resources\MusicResource\Pages;

use App\Filament\Resources\MusicResource;
use Filament\Resources\Pages\EditRecord;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Music;
use App\Models\Creator;
use App\Models\Gendre;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Livewire\WithFileUploads;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;

class EditMusic extends EditRecord
{
    protected static string $resource = MusicResource::class;

    protected static string $view = 'filament.resources.music.edit-audio';


    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function render(): View
    {

        return view(static::$view, $this->getViewData())
            ->layout(static::$layout, $this->getLayoutData());
    }



    protected function getViewData(): array
    {
        return [
            'creators' => Creator::all(),
            'artists' => Artist::all(),
            'albums' => Album::all(),
            'gendres' => Gendre::all()
        ];
    }

}
