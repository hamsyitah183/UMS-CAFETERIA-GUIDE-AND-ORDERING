<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Owner;

use App\Models\PlaceType;
use App\Models\FoodOption;
use App\Models\Announcement;
use App\Models\OpeningHours;
use App\Models\ReviewAndRating;
use Faker\Factory;
use Illuminate\Database\Seeder;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::create([  
        //     'name' => 'Hamsyitah',
        //     'username' => 'ita',
        //     'email' => 'hh@gmail.com',
        //     'password' => bcrypt('12345'),
        //     'role' => 'admin',
        //     'no_phone' => '01234322',
        //     'addressLine1' => 'Kg, Tabilong',
        //     'addressLine2'=> '89650 Tambunan',
        //     'addressLine3' => 'Malaysia',
        // ]);

        // User::create([  
        //     'name' => 'Shigebu',
        //     'username' => 'gebus',
        //     'email' => 'gebu@gmai.com',
        //     'password' => bcrypt('12345'),
        //     'role' => 'admin',
        //     'no_phone' => '0123422342',
        //     'addressLine1' => 'Kg, Tabilong',
        //     'addressLine2'=> '89650 Tambunan',
        //     'addressLine3' => 'Malaysia',
        // ]);

        // User::create([  
        //     'name' => 'SiChalamet',
        //     'username' => 'amet',
        //     'email' => 'amet@gmai.com',
        //     'password' => bcrypt('12345'),
        //     'role' => 'owner',
        //     'no_phone' => '019834322',
        //     'addressLine1' => 'Kg, Tabilong',
        //     'addressLine2'=> '89650 Tambunan',
        //     'addressLine3' => 'Malaysia',
        // ]);

        // User::create([  
        //     'name' => 'SiChalameww',
        //     'username' => 'ila',
        //     'email' => 'amset@gmai.com',
        //     'password' => bcrypt('12345'),
        //     'role' => 'owner',
        //     'no_phone' => '019834322',
        //     'addressLine1' => 'Kg, Tabilong',
        //     'addressLine2'=> '89650 Tambunan',
        //     'addressLine3' => 'Malaysia',
        // ]);

        // User::create([  
        //     'name' => 'mira',
        //     'username' => 'mira',
        //     'email' => 'amesst@gmai.com',
        //     'password' => bcrypt('12345'),
        //     'role' => 'owner',
        //     'no_phone' => '019834322',
        //     'addressLine1' => 'Kg, Tabilong',
        //     'addressLine2'=> '89650 Tambunan',
        //     'addressLine3' => 'Malaysia',
        // ]);

                // Create 15 owners
        User::factory()->count(15)->create(['role' => 'owner', 'password' => bcrypt('12345')]);

        // Create 15 customers
        // User::factory()->count(15)->create(['role' => 'customer']);


        // PlaceType::create([
        //     'name' => 'Cafeteria',
        //     'image' => 'https://www.ums.edu.my/v5/images/article-images/cafe3.jpg',
        //     'description' => 'The Campus Palate: A Culinary Journey Awaits',

        // ]);

        // PlaceType::create([
        //     'name' => 'Kiosk',
        //     'image' => 'https://cart-king.com/wp-content/uploads/2013/04/food-vendor.jpg',
        //     'description' => 'Quick Bites, Big Delights: Discover Our Flavorful Kiosk'
        // ]);

        // PlaceType::create([
        //     'name' => 'Vendor',
        //     'description' => 'Unleash Your Taste Buds with Our Flavorful Delights',
        //     'image' => 'https://themiamihurricane.com/wp-content/uploads/2014/09/NEWS_PitaPad_TH.jpg'
        // ]);

        // Announcement::factory(10)->create();

        // Owner::factory(30)->create();
        FoodOption::factory(10)->create();
        // OpeningHours::factory(40)->create();

        ReviewAndRating::factory(30)->create();

    }
}
