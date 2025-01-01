<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
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
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'featured_image_url' => $this->faker->imageUrl(640, 480),
            'status' => $this->faker->randomElement(['pending', 'approved']), // Randomize status
            'view_count' => $this->faker->numberBetween(100, 1000),
            'published_at' => $this->faker->dateTime,
            'author_id' => User::factory(), // Set a default or link to a user factory
            'category_id' => Category::factory(), // Automatically create a category
            'tag_id' => Tag::factory(), // Automatically create a tag
        ];
    }
}
