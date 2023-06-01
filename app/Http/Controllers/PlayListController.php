<?php

namespace App\Http\Controllers;

use App\Http\Resources\MusicCollection;
use App\Models\Music;
use App\Models\PlayList;
use App\Models\PlayListMusic;
use Illuminate\Http\Request;

class PlayListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $playList = $request->user()->playlists;    
        
        return $request->user()->play_list;

        return response()->json($playList, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string', 
            'detail' => 'string'
        ]);

        $cek = PlayList::where('name', $request->name)
                        ->where('user_id', $request->user()->id)->first();

        if($cek){

            return response()->json([
                'message' => "Nama Playlist sudah pernah dibuat sebelumnya"
            ], 422);
        }

        if($request->thumbnail){

            $real_path = $request->file('thumbnail')->store('public/thumbnails');
            $path = explode('public/', $real_path);  
            $path= $path[1];  
        }else{
            $path = null;
        }           
      

        $playList = PlayList::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'detail' => $request->detail,
            'thumbnail' => $path
           
        ]);

        return response()->json($playList,201);
    }

   
    /**
     * Display the specified resource.
     */
    public function show(Request $request,  $id)
    {

        $playlist = PlayList::find($id);

        if(!$playlist){

            return response()->json([
                "message" =>  "Playlist Not Found"
             ]);
        }

        $musics_ids = $playlist->musics->pluck('id');
        

        return response()->json([
           "play_list" =>  $playlist->name, 
           "musics" => new MusicCollection( Music::whereIn('musics.id', $musics_ids)->get() )
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([           
            'name' => 'string|required'
        ]);      
        
        $playList = PlayList::find($id);

        if(!$playlist){

            return response()->json([
                "message" =>  "Playlist Not Found"
             ]);
        }

        $playList->name = $request->name;
        $playList->save();


        if($request->thumbnail){

            $real_path = $request->file('thumbnail')->store('public/thumbnails');
            $path = explode('public/', $real_path);  
            $path= $path[1];  

            $playList = PlayList::find($id);
            $playList->thumbnail = $path;
            $playList->save();


        }

        return response()->json([
            'message' => 'playlist was updated',
            'playlist' => $playList
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {

        $playList = PlayList::find($id);    


        if(!$playList){

            return response()->json([
                "message" =>  "Playlist Not Found"
             ]);
        }

        $playList->delete();

        return response()->json([
            'message' => 'playlist was deleted'            
        ], 200);
    }

    public function store(Request $request, $id){

        $request->validate([
            'music_id' => 'required'
        ]);        

        // $play_list = PlayList::find($id);
       
        PlayListMusic::create([
            'musics_id' => $request->music_id,
            'playlist_id' => $id,
            'user_id' => $request->user()->id
        ]);

        return response()->json([
            'message' => 'Data telah ditembahkan'            
        ], 201);
        
    }

    public function delete_from_playlist(Request $request, $id){

        $request->validate([
            'music_id' => 'required'
        ]);        

        // $play_list = PlayList::find($id);
       
        PlayListMusic::where('music_id', $request->music_id)->where('playlist_id', $id)->delete();

        return response()->json([
            'message' => 'Data telah dihapus'            
        ], 201);
        
    }
}
