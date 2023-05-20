<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $table = 'musics';

    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];


    public function play_list(){

        return $this->belongsToMany(PlayList::class, 'playlist_musics', 'musics_id', 'playlist_id');       


    }

    public function creator(){

        return $this->belongsTo(Creator::class);
    }
}
