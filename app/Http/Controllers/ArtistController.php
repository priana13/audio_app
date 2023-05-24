<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Resources\MusicCollection;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $artist = Artist::all();

        return response()->json($artist, 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, $artist)
    {       

        $data = Artist::find($artist);

        if($data){

            return new MusicCollection($data->musics);

        }else{

            return response()->json([
                'message' => 'Data Artist tidak ditemukan'                
            ], 404);
        }


        
    }
   
}
