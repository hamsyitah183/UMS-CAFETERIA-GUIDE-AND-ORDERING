<?php

namespace Database\Seeders;

use App\Models\Map;
use App\Models\FoodOption;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $foodOptionCount = FoodOption::count();

        Map::factory(3)->create();
    }
}
