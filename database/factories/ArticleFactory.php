<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 5),
            'category_id' => rand(1, 5),
            'title' => fake()->words(rand(5, 10), true),
            'description' => fake()->paragraphs(rand(12, 15), true),
            'slug' => fake()->slug()
        ];
    }
}
