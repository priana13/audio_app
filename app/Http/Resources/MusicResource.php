<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MusicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {        

        return [
            'title' => $this->title,
            'detail' => $this->detail, 
            'url' => $this->url,
            'thumbnail' => $this->thumbnail,
            'audio' => url($this->audio),
            'creator' => $this->creator->name,
            'album' => $this->album->name,
            'gendre' => $this->gendre->name,
            'artist' => $this->artist->name,
            'is_premium' => ($this->is_premium)? TRUE: FALSE
        ];


    }
}
