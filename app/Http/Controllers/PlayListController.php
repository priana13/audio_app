<?php

namespace App\Http\Controllers;

use App\Http\Resources\MusicCollection;
use App\Models\Music;
use App\Models\PlayList;
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

        $playList = PlayList::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'detail' => $request->detail
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
}
