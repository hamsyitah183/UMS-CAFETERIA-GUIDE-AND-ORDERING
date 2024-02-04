<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\FoodOption;
use Carbon\Carbon;

class FoodOptionChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $year = 2024;

        // Initialize an array to store monthly counts
        $monthlyCounts = [];
        $monthName = [];

        // Loop through each month
        for ($month = 1; $month <= 12; $month++) {
            // Count the number of food places created in the current month of the specified year
            $monthlyCount = FoodOption::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->count();

            $monthName[$month] = Carbon::createFromDate($year, $month, 1)->format('F');


            // Store the count in the array
            $monthlyCounts[$month] = $monthlyCount;
        }

        // dd($monthlyCounts[1]);

        
        return $this->chart->barChart()
        ->setTitle('Total Food Option registered 2024')
        ->setSubtitle('2024.')
        ->addData('Total',[$monthlyCounts[1], $monthlyCounts[2], $monthlyCounts[3], $monthlyCounts[4], $monthlyCounts[5], $monthlyCounts[6],$monthlyCounts[7],$monthlyCounts[8]
            ,$monthlyCounts[9], $monthlyCounts[10], $monthlyCounts[11] , $monthlyCounts[12]
        ])
      
        ->setColors(['#FF6347'])
        ->setLabels([$monthName[1], $monthName[2], $monthName[3], $monthName[4], $monthName[5], $monthName[6],$monthName[7],$monthName[8]
        ,$monthName[9], $monthName[10], $monthName[11] , $monthName[12]
        ]);
    }
}
