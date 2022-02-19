<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'author_name' => $this->faker->name(),
            'content' => $this->faker->sentence(15),
            'category_id' => rand(1, 6)
        ];
    }
}
