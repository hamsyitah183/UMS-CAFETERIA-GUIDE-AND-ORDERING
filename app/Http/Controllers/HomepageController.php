<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\FoodOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomepageController extends Controller
{
    //
    public function index()
    {
        // @dd(request('search'));
        $foodOption = FoodOption::with(['menu', 'owner'])->latest();

        if(request('search')) {
            $foodOption->where('place_name', 'like' , '%' . request('search'). '%')
                
            ;
        }
        return view('UMS.home', [
            'type' => 'Home',
            'style' => [
                'UMS/wajib',
                'UMS/homepage',
                // 'admin/adminDashboard',
                // 'homepage'
            ],
            'announcement' => \App\Models\Announcement::all()
        ]);
    }

    public function search()
    {
        // @dd(request('search'));
        
        if(request('search') == 'cafeteria')
        {
            request()->merge(['search' => 2]);
            // @dd(request('search'));

        }
        elseif (request('search') == 'kiosk')
        {
            request('search') == '2';
        }
            
        $foodOptionResults = FoodOption::latest()->filter(request(['search']))->get();
        $menuResults = Menu::latest()->filter(request(['search']))->get();
        
        $searchResults =  $foodOptionResults->merge($menuResults);
        return view('UMS.search', [
            'type' => 'Home',
            'style' => [
                'UMS/wajib',
                'UMS/search',
                // 'admin/adminDashboard',
                // 'homepage',
                
            ],
            'search' => $foodOptionResults,
            'searchMenu' => $menuResults,
            'searchResults' => $searchResults
            // 'announcement' => \App\Models\Announcement::all()
        ]);
    }
   
}
