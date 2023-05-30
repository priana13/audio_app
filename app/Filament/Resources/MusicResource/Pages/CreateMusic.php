<?php

namespace App\Filament\Resources\MusicResource\Pages;

use App\Filament\Resources\MusicResource;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Music;
use App\Models\Creator;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Livewire\WithFileUploads;
use Illuminate\Contracts\View\View;

class CreateMusic extends CreateRecord
{
    use WithFileUploads;

    protected static string $resource = MusicResource::class;

    protected static string $view = 'filament.resources.music.create-audio';

    public $judul, $creator_id, $audio, $detail, $url, $thumbnail, $is_premium = false, $artis_id, $album_id;


    public function simpan(){ 

        $this->validate([
            'judul' => 'required',
            'audio' => 'required'
        ]);     


        Music::create([
            'title' => $this->judul,
            'creator_id' => $this->creator_id,
            'detail' => $this->detail,
            'audio' => $this->audio,
            'thumbnail' => $this->thumbnail,
            'is_premium' => $this->is_premium, 
            'artist_id' => $this->artis_id,
            'album_id' => $this->album_id

        ]);

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
        ];
    }
}
