<?php

namespace Database\Factories;

use App\Models\FoodOption;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Map>
 */
class MapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $foodOptionCount = FoodOption::count();
        return [
            'place_id' => $this->faker->unique()->numberBetween(1, $foodOptionCount),
            'latitude' =>  $this->faker->latitude($min = 5.0, $max = 6.0),
            'longitude' => $this->faker->longitude($min = 115.0, $max = 117.0),
            // 'place_id' => fn() => FoodOption::factory()->create()->id,
            // 'latitude' => fn() => $this->faker->latitude($min = 5.0, $max = 6.0),
            // 'longitude' => fn() => $this->faker->longitude($min = 115.0, $max = 117.0),
        ];
    }
}
