<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Music;
use App\Models\Creator;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Livewire\WithFileUploads;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;

class CreateAudioComponent extends Component
{
    use WithFileUploads;

    public $judul, $creator_id, $audio, $detail, $url, $thumbnail, $is_premium = false, $artis_id, $album_id;
    public $photo;


    public function render()
    {


        return view('livewire.create-audio-component',[
            'creators' => Creator::all(),
            'artists' => Artist::all(),
            'albums' => Album::all(),
        ]);
    }

    public function simpan(){ 

        $this->validate([
            'judul' => 'required',
            'audio' => 'max:10240'
            
        ]);   
        
        // $path = $this->audio->store('audio');

        
        Music::create([
            'title' => $this->judul,
            'creator_id' => $this->creator_id,
            'detail' => $this->detail,
            'audio' => $path,
            'thumbnail' => $this->thumbnail,
            'is_premium' => $this->is_premium, 
            'artist_id' => $this->artis_id,
            'album_id' => $this->album_id

        ]);

        Redirect::to('/admin/music');


    }
}
