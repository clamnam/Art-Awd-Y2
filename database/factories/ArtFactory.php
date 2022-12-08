<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Art>
 */
class ArtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //Factory is used to create fake data using the model through faker
            'title' => $this->faker->word,
            'description' => $this->faker->text(200),
            'artist' => $this->faker->text(20),
            'art_style' => $this->faker->text(11),
            'user_id' => 2,
            'art_image' => $this->faker->image('public/storage', ('tit.png'), 360, 360,)
            // 'art_image' => $this->faker->text(11)



        ];
    }
}
