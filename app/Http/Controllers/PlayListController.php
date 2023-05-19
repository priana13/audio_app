<?php

namespace App\Http\Controllers;

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

        return response()->json([
           "play_list" =>  $playlist, 
           "musics" => ""
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlayList $playList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlayList $playList)
    {
        //
    }
}
