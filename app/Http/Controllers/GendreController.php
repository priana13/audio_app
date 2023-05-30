<?php

namespace App\Http\Controllers;

use App\Models\Gendre;
use Illuminate\Http\Request;
use App\Http\Resources\MusicCollection;

class GendreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gendre = Gendre::all();

        return response()->json($gendre);
    }


    /**
     * Display the specified resource.
     */
    public function show(Gendre $gendre)
    {
        return new MusicCollection($gendre->musics) ;
    }

}
