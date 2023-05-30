<?php

namespace App\Http\Controllers;

use App\Http\Resources\MusicCollection;
use App\Models\Creator;
use Illuminate\Http\Request;

class CreatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creators = Creator::all();

        return response()->json($creators);
    }


    /**
     * Display the specified resource.
     */
    public function show(Creator $creator)
    {
        return new MusicCollection($creator->musics) ;
    }

}
