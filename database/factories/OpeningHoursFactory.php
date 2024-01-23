<?php

namespace Database\Factories;

use App\Models\OpeningHours;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OpeningHours>
 */
class OpeningHoursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        return [
            'foodOption_id' => $this->faker->numberBetween(1, 30), // Assuming you have 30 foodOption records
            'dayOfTheWeek' => function (array $attributes) use ($daysOfWeek) {
                // Ensure that each day occurs only once for each foodOption_id
                $remainingDays = array_diff($daysOfWeek, OpeningHours::where('foodOption_id', $attributes['foodOption_id'])->pluck('dayOfTheWeek')->toArray());
                return $this->faker->randomElement($remainingDays);
            },
            'openTime' => $this->faker->time('H:i'),
            'closeTime' => $this->faker->time('H:i'),
        ];
    }
}
