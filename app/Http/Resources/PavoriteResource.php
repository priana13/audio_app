<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PavoriteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'music_id' => $this->music->id,
            'title' => $this->music->title,
            'audio' => $this->music->audio,
            'creator' => $this->music->creator->name,            
        ];
    }
}
