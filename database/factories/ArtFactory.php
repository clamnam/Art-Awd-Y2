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
            //
            'title' =>$this->faker->word,
            'description' => $this->faker->text(200),
            'artist' => $this->faker->text(20),
            'genre' => $this->faker->text(11)


        ];
    }
}
