<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    //getting visitor counts based on bookings they made
    public function visitorChart(){
        
        $visitors = Booking::selectRaw('MONTH(booking_Date) as month, COUNT(*) as count')
        ->whereYear('booking_Date', date('Y'))
        ->where('booking_Status', 'confirmed')
        ->groupBy('month')
        ->orderBy('month')
        ->get();


        $labels = [];
        $data = [];

        for($i=1; $i <= 12; $i++) {
            $month = date('F', mktime(0,0,0,$i,1));
            $count = 0;

            foreach($visitors as $visitor) {
                if($visitor->month == $i) {
                    $count = $visitor->count;
                    break;
                }
            }


            array_push($labels, $month);
            array_push($data, $count);


        }

        $datasets = [
            'labels' =>$labels,
            'datasets'=>[
                [
                    'label' => "Bookings",
                    'data' => $data
                ],
            ],
        ];

            return $datasets;
    }
    
}
