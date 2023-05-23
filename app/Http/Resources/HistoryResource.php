<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class HistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {     

        // id": 1,
        // "title": "Ut architecto commodi.",
        // "detail": "Veniam asperiores provident rerum repudiandae voluptatem.",
        // "url": "http://walter.org/possimus-rerum-tempore-qui-ut-placeat.html",
        // "thumbnail": "https://via.placeholder.com/640x480.png/006633?text=neque",
        // "audio": "http://krajcik.net/optio-cumque-id-earum-ea-occaecati-repudiandae-repellendus-est.html",
        // "creator_id": 1,
        // "is_premium": 0

        return [
            'title' => $this->music->title,
            'audio' => $this->music->audio,
            'creator' => $this->music->creator->name,
            'is_premium' => $this->music->is_premium,
            'date_text' => $this->created_at->diffForHumans(),
            'date' => $this->created_at
            
        ];
    }
}
