<?php

namespace App\Http\Controllers;

use App\Http\Resources\PavoriteResourceCollection;
use App\Models\History;
use App\Models\Pavorite;
use Illuminate\Http\Request;
use Psy\VersionUpdater\Checker;

class PavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->user()->pavorites;

        return new PavoriteResourceCollection($data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'music_id' => 'required'
        ]);

        $check = Pavorite::where('musics_id', $request->music_id)
                                ->where('user_id', $request->user()->id)->first();
        
        if(!$check){

            Pavorite::create([
                'user_id' => $request->user()->id,
                'musics_id' => $request->music_id
            ]);
            
        }

        return response()->json([
            'message' => 'Success'           
        ],201);
            
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $data = $request->user()->pavorites()->where('musics_id', $id)->delete();

        if($data){

            return response()->json([
                'message' => 'Data Berhasil dihapus'           
            ],202);

        }else{

            return response()->json([
                'message' => 'Kemungkinan data sudah hapus sebelumnya'           
            ],422);

        }
    }
}
