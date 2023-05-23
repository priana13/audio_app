<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'histories';

    protected $guarded = [];

    protected $with = ['music'];

    protected $hidden = ['updated_at'];

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function music(){

        return $this->belongsTo(Music::class, 'musics_id');
    }
}
