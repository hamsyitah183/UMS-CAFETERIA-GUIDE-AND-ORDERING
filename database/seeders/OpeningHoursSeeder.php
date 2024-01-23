<?php

namespace Database\Seeders;

use App\Models\OpeningHours;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OpeningHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        OpeningHours::create([
            'foodOption_id' => 1,
            'dayOfTheWeek' => 'Monday',
            'openTime' => '9:00',
            'closeTime' => '17:00'
        ]);

        OpeningHours::create([
            'foodOption_id' => 1,
            'dayOfTheWeek' => 'Tuesday',
            'openTime' => '9:00',
            'closeTime' => '17:00'
        ]);

        OpeningHours::create([
            'foodOption_id' => 1,
            'dayOfTheWeek' => 'Wednesday',
            'openTime' => '9:00',
            'closeTime' => '17:00'
        ]);

        OpeningHours::create([
            'foodOption_id' => 1,
            'dayOfTheWeek' => 'Thursday',
            'openTime' => '9:00',
            'closeTime' => '17:00'
        ]);

        OpeningHours::create([
            'foodOption_id' => 1,
            'dayOfTheWeek' => 'Friday',
            'openTime' => '9:00',
            'closeTime' => '17:00'
        ]);

        OpeningHours::create([
            'foodOption_id' => 1,
            'dayOfTheWeek' => 'Saturday',
            'openTime' => '9:00',
            'closeTime' => '17:00'
        ]);

        OpeningHours::create([
            'foodOption_id' => 1,
            'dayOfTheWeek' => 'Sunday',
            'openTime' => '9:00',
            'closeTime' => '17:00'
        ]);
    }
}
