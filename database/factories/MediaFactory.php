<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'file_name' => $this->faker->word . '.jpg',
            'file_type' => 'image/jpeg',
            'file_url' => $this->faker->imageUrl,
            'file_size' => $this->faker->numberBetween(100, 5000),
            'uploaded_by' => User::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
