<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\FoodOption;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReviewAndRating>
 */
class ReviewAndRatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customerUser = User::where('role', 'customer')->inRandomOrder()->first();
        return [
            'user_id' => $customerUser ? $customerUser->id : null,
            'place_id' => FoodOption::inRandomOrder()->value('id'),
            'rate' => $this->faker->numberBetween(1, 5),
            'message' => $this->faker->paragraph,
            'name' => $customerUser->username,
            // 'type' => $this->faker->randomElement(['customer', 'guest']),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
