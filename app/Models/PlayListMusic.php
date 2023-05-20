<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayListMusic extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'playlists_musics';

    public function user(){

        return $this->belongsTo(User::class);
    }
}
