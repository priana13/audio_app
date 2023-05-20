<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayList extends Model
{
    use HasFactory;

    protected $table = 'playlists';

    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at', 'user_id'];

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function musics(){

        return $this->belongsToMany(Music::class, PlayListMusic::class, 'playlist_id', 'musics_id');

    }
}
