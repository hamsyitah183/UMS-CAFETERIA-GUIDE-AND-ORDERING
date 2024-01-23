<?php

namespace Database\Factories;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodOption>
 */
class FoodOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    
    public function definition(): array
    {
        $images = [
            'https://images.pexels.com/photos/914388/pexels-photo-914388.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'https://www.ukm.my/kab/wp-content/uploads/2020/10/photo_2020-09-15_23-07-24-1024x767.jpg',
            'https://www.ums.edu.my/v5/images/article-images/cafe2.jpg',
            'https://fastly.4sqi.net/img/general/200x200/43513103_we33WWYiGBwADnCGH0cIF3L6dm_YRreOQpWkQKLVGBg.jpg',
            'https://fastly.4sqi.net/img/general/600x600/581555775_zjb_v1bJXnroOTuvxqVY_LvvWVnKxs7TIA955hL_5NU.jpg',
            'https://mahallah.iium.edu.my/aminah/wp-content/uploads/sites/8/2021/02/cafe2-min-1024x768.jpg',
            'https://www.kolejseroja.unimas.my/images/2022/05/29/photo6096030809485062618.jpg',
            'https://www.unimasholdings.unimas.my/images/2021/04/12/sp7.jpg'
        ];

        $placeName = $this->placeName();
        $placeSlug = Str::slug($placeName, '-');

        return [
            'owner_id' => User::where('role', 'owner')->inRandomOrder()->first()->id,            
            'place_name' =>$placeName,
            'place_slug' => $placeSlug,
            // 'place_slug' => $placeSlug,
            'type' => mt_rand(1,3),
            'image' => $images[mt_rand(0, count($images)-1)],
            'description' => $this->faker->sentence(),
            'phoneNumber' => $this->faker->mobileNumber()
        ];
    }


    // place name
    // public function placeName()
    // {
    //     $keywords = ['Jaya', 'Sinaran', 'Park', 'Square', 'Plaza', 'Seroja', 'Rafflesia', 'Maju', 'Matahari', 'Kekwa', 'Tulip', 'Orange'];

    //     $keyword = $this->faker->randomElement($keywords);

    //     return 'Cafe '. $keyword .'';
    // }

    protected function placeName()
    {
        $words = ['Jaya', 'Sinaran', 'Park', 'Square', 'Plaza', 'Seroja', 'Rafflesia', 'Maju', 'Matahari', 'Kekwa', 'Tulip', 'Orange', 'Anggerik', 'Bunga', 'House', 'Kasih'];
        $title = implode(' ', $this->faker->randomElements($words, mt_rand(1, 4)));

        do {
            $placeName = $title;
        } while (\App\Models\FoodOption::where('place_name', $placeName)->exists());

        return $title;
    }
}
