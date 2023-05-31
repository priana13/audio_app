<?php

namespace App\Http\Controllers;

use App\Http\Resources\MusicCollection;
use App\Models\Music;
use Illuminate\Http\Request;;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $musics = Music::orderBy('id');

        if($request->key){

            $key = "%" . $request->key . "%";

            $musics->where('title', 'LIKE', $key);
            
        }      

        $musics = $musics->paginate(10);

        return new MusicCollection($musics); 
    }

    public function store(Request $request){

        $validated = $request->validate([
            'judul' => 'required',
            'audio' => 'required',
            'creator_id' => 'required'
        ]);

        $extention = $request->file('audio')->getClientOriginalExtension();


        $real_path = $request->file('audio')->store('public/audio');
        $path = explode('public/', $real_path);
        $path = $path[1];

        
        ($request->is_premium == 'on')? $is_premium = true : $is_premium = false;

                
        $audio = Music::create([
            'title' => $request->judul,
            'creator_id' => $request->creator_id,
            'detail' => $request->detail,
            'audio' => $path,
            'thumbnail' => $request->thumbnail,
            'is_premium' => $is_premium, 
            'artist_id' => $request->artis_id,
            'album_id' => $request->album_id

        ]);

        return redirect()->to('/admin/music');
    }

    public function update(Request $request, $id){

        $validated = $request->validate([
            'judul' => 'required',           
            'creator_id' => 'required'
        ]);

        if($request->file){

            $real_path = $request->file('audio')->store('public/audio');
            $path = explode('public/', $real_path);
            $path = $path[1];


            Music::where('id', $id)->update([
                'audio' => $path,
                   
            ]);

        }
        
        ($request->is_premium == 'on')? $is_premium = true : $is_premium = false;
      
                
        $audio = Music::where('id', $id)->update([
            'title' => $request->judul,
            'creator_id' => $request->creator_id,
            'detail' => $request->detail,
            'thumbnail' => $request->thumbnail,
            'is_premium' => $is_premium, 
            'artist_id' => $request->artis_id,
            'album_id' => $request->album_id

        ]);

        return redirect()->to('/admin/music');
    }

    
}
