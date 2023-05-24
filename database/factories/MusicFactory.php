<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Music>
 */
class MusicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title' => $this->faker->sentence(2),
            'detail' => $this->faker->sentence(6), 
            'url' => $this->faker->url(),
            'thumbnail' => $this->faker->imageUrl(),
            'audio' => $this->faker->url(),
            'creator_id' => rand(1,4),
            'artist_id' => rand(1,4),
            'album_id' => rand(1,4),
            'is_premium' => false,

        ];
    }
}
