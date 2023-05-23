<?php

namespace App\Http\Controllers;

use App\Http\Resources\HistoryResourceCollection;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $history = $request->user()->histories;        

        return new HistoryResourceCollection($history);

        return response()->json($musics,200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'musics_id' => 'required'
        ]);

        $get_history = History::where('musics_id', $request->musics_id)
                                ->where('user_id', $request->user()->id)->first();

        if($get_history){

            $get_history->created_at = now();
            $message = "data has been changed";

        }else{

            $get_history = History::create([
                'user_id' => $request->user()->id,
                'musics_id' => $request->musics_id
            ]);
            $message = "data has been created";
        }        

        return response()->json([
            'message' => $message,
            'data' => $get_history
        ],201);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'type' => 'required|string'
        ]);   
        
        if(!in_array($request->type, ['single_delete', 'all_delete'])){

            return response()->json([
                'message' => 'Parameter type tidak ditemukan, silahkan pilih salah satu dari kategory single_delete atau all_delete'
            ],422);

        }

        if($request->type == 'single_delete'){

            $histories = $request->user()->histories()->where('id', $request->id)->delete();

            if($histories){

                return response()->json([
                    'message' => 'History berhasil di hapus'
                ],422);

            };

        }else{


            $histories = $request->user()->histories()->delete();

            if($histories){

                return response()->json([
                    'message' => 'History berhasil di hapus'
                ],422);

            };

        }
        

        return response()->json([
            'message' => 'Tidak ada data yang dihapus, mungkin data ini sudah dihapus sebelumnya'
        ],422);

    }   
}
