<?php

namespace Database\Factories;

use App\Models\Music;
use App\Models\PlayList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlayListMusic>
 */
class PlayListMusicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $play_list = PlayList::find(rand(1,20));
       
        return [
            'musics_id' => rand(1,51),
            'playlist_id' => $play_list->id,
            'user_id' => $play_list->user_id
        ];
    }
}
