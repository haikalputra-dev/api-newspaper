<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Article;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => User::factory(), // Set a default or link to a user factory
            'article_id' => Article::factory(), // Automatically create a category
        ];
    }
}
