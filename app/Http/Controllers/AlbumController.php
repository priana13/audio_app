<?php

namespace App\Http\Controllers;

use App\Http\Resources\MusicCollection;
use App\Models\Album;
use App\Models\Music;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $album = Album::all();

        return $album;
    }

   
    /**
     * Display the specified resource.
     */
    public function show(Request $request, $album)
    {       
        $data = Album::find($album);

        if($data){

            return new MusicCollection($data->musics);
        }else{

            return response()->json([
                'message' => 'Data Album tidak ditemukan'                
            ], 404);
        }


        
    }
    
}
