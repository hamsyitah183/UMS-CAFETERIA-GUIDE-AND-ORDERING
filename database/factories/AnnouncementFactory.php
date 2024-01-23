<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image = [
            'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'https://images.pexels.com/photos/1099680/pexels-photo-1099680.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'https://images.pexels.com/photos/958545/pexels-photo-958545.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'https://images.pexels.com/photos/699953/pexels-photo-699953.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'https://images.pexels.com/photos/769289/pexels-photo-769289.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'https://images.pexels.com/photos/1410235/pexels-photo-1410235.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
        ];

        return [
            //
            'title' => $this->faker->sentence(mt_rand(2,7)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            'user_id' => 1,
            'start' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'end' => $this->faker->dateTimeBetween('now', '+1 month'),
            'body' => $this->faker->paragraph(),
            'place'=> $this->faker->unique()->sentence(mt_rand(5,10)),
            'image' => $image[mt_rand(1, count($image)-1)]
        ];
    }
}
