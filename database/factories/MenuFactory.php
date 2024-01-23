<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private $categoryNames = [
        'Breakfast' => ['Donut', 'Kuih pisang', 'Bom'],
        'Lunch' => ['Sandwich', 'Salad'],
        'Drink' => ['Coffee', 'Smoothie'],
    ];

    public function definition(): array
    {
        // $words = ['Donut', 'Kuih pisang'];
        $category = $this->faker->randomElement(array_keys($this->categoryNames));
        $words = $this->categoryNames[$category];

        return [
            'place_id' => 5,
            'name' => $this->faker->randomElement($words),
            'price' => $this->faker->randomFloat(2, 0, 2),
            'description' => $this->faker->sentence(2),
            'category' => $category,
        ];
    }

    public function breakfast()
    {
        return $this->state([
            'category' => 'Breakfast',
        ]);
    }

    public function lunch()
    {
        return $this->state([
            'category' => 'Lunch',
        ]);
    }

    public function drink()
    {
        return $this->state([
            'category' => 'Drink',
        ]);
    }
}
