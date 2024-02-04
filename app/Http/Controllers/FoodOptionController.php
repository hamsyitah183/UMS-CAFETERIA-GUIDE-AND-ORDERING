<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Gallery;

use App\Models\OwnerPost;
use App\Models\PlaceType;
use App\Models\FoodOption;
use App\Models\OpeningHours;
use App\Http\Requests\StoreFoodOptionRequest;
use App\Http\Requests\UpdateFoodOptionRequest;

class FoodOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
            return view('UMS.foodOption', [
                'type' => 'UMS Food Option',
                'style' => [
                    'UMS/wajib',
                    'UMS/foodOption'
                ],
    
            ]);
    
        
        
    }

    public function type(PlaceType $placeType)
    {
        $place = foodOption::all()->where('type', $placeType->id);
        return view('UMS.placeType', [
            'type' => 'UMS ' . $placeType['name'] .' Food Option',
            'style' => [
                'UMS/wajib',
                'UMS/placeType'
            ],
            'placeType' => $placeType,
            'places' => $place,

        ]);
    }

    public function individual(FoodOption $foodOption)
    {
        // $days = OpeningHours::all()->where('foodOption_id', $foodOption->id );
        return view('UMS.individual', [
            'type' => $foodOption->name,
            'style' => [
                'UMS/wajib',
                'UMS/individual'
            ],
            'foodOption' => $foodOption,
            // 'days' => $days
        ]);
    }

    public function gallery(FoodOption $foodOption)
    {
        // $pictures = Gallery::all()->where('place_id', $foodOption->id );
        return view('UMS.gallery', [
            'type' => $foodOption->name,
            'style' => [
                'UMS/wajib',
                'UMS/gallery'
            ],
            'foodOption' => $foodOption,
            // 'pictures' => $pictures
        ]);
    }

    public function search(FoodOption $foodOption)
    {
        // @dd(request('searchIndividual'));
        
        return view('UMS.search2', [
            'type' => 'Home',
            'style' => [
                'UMS/wajib',
                'UMS/search',
                // 'admin/adminDashboard',
                // 'homepage',
                
            ],
            'search' => Menu::latest()
                        ->where('place_id', $foodOption->id)
                        ->filter(request(['search']))
                        ->get()
        ]);
    }

    public function post(FoodOption $foodOption)
    {
        // @dd(request('searchIndividual'));
       $post = OwnerPost::where('place_id', $foodOption->id)->get();
    //    dd($post);
        return view('UMS/post', [
            'type' => 'Post',
            'active' => 'about',
            'title' => 'About',
            'style' => [
                'UMS/wajib',
                'UMS/homepage',
                'UMS/announcement'
            ],
            'announcements' => $post,
        ]);
    }

    public function individualPost(FoodOption $foodOption, $id)
    {
        $post = OwnerPost::where('place_id', $foodOption->id)->where('id', $id)->first();

        return view('UMS.postView', [
            'type' => 'Post',
            'active' => 'about',
            'title' => 'About',
            'style' => [
                'UMS/wajib',
                'UMS/homepage',
                'UMS/announcementIndividual'
            ],
            'announcement' => $post,
        ]);
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodOptionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodOption $foodOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FoodOption $foodOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodOptionRequest $request, FoodOption $foodOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FoodOption $foodOption)
    {
        //
    }
}
