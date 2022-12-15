<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Style>
 */
class StyleFactory extends Factory
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

            'name' => $this->faker->text(20),
            'description' => $this->faker->text(20),
        ];
    }
}
