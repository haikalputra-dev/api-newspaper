<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password_hash' => bcrypt('password'),
            'full_name' => $this->faker->name,
            'bio' => $this->faker->sentence,
            'profile_image_url' => $this->faker->imageUrl(),
            'role' => $this->faker->randomElement(['admin', 'user']), // Adjust valid roles
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
