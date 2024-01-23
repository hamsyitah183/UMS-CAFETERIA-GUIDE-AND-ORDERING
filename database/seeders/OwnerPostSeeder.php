<?php

namespace Database\Seeders;

use App\Models\OwnerPost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OwnerPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        OwnerPost::create([
            'place_id' => '4',
            'image' => 'https://images.pexels.com/photos/312418/pexels-photo-312418.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'category' => 'Promo',
            'title' => 'Special Promo',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim optio odio libero ab quis aut, repellendus at praesentium deleniti molestias.',
            'status' => 'Ongoing'
            
        ]);
    }
}
