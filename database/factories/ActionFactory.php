<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Action>
 */
class ActionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // misalnya actions random
            'actions' => $this->faker->randomElement(['view','like','dislike','comment','share','bookmark','report']),
            'created_at' => now(),
            'updated_at' => now(),
            // Otomatis bikin user baru untuk setiap action
            // Jika PK user = 'user_id', definisikan di model User -> $primaryKey = 'user_id'
            'user_id' => User::factory(),
            'target_id' => 1, // atau Article::factory(), tergantung logika 
        ];
    }
}
