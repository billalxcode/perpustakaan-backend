<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'author' => fake()->name(),
            'isbn' => fake()->isbn13(),
            'cover_image' => fake()->imageUrl(),
            'description' => fake()->paragraph(),
            'publisher' => fake()->company(),
            'published_at' => fake()->date(),
            'pages' => fake()->numberBetween(100, 1000),
            'category_id' => fake()->numberBetween(1, 10),
        ];
    }
}
