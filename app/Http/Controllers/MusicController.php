<?php

namespace App\Http\Controllers;

use App\Http\Resources\MusicCollection;
use App\Models\Music;
use Illuminate\Http\Request;

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

    
}
