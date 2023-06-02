<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    protected $guarded = [];

    public function musics(){

        return $this->hasMany(Music::class);
    }

}
