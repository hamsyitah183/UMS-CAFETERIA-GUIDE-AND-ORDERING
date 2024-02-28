<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\User;
use App\Models\FoodOption;
use App\Models\OpeningHour;
use Illuminate\Support\Str;
use App\Models\OpeningHours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class OwnerFoodOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');
        if(auth()->user()->role == 'admin') {
            $foodOption = FoodOption::all();
        
            return view('UMS.dashboard.foodOption.AdminFoodOption', [
                'type' => 'foodOption',
                'style' => [
                    'admin/adminDashboard',
                    'admin/adminAnnouncement',
                    'admin/adminCustomer'
                ],
                'customers'=> $foodOption

            ]);
        }

        elseif(auth()->user()->role == 'owner') {
            $owner = User::where('id', auth()->user()->id)->get();
            // $foodOption = FoodOption::where('owner_id',  auth()->user()->id)->get();
            return view('UMS.dashboard.foodOption.OwnerFoodOption', [
                'type' => 'foodOption',
                'style' => [
                    // 'owner/ownerDashboard',
                    'admin/adminDashboard',
                    
                    'owner/ownerFoodOption'
                ],
                'owner' => $owner
            ]);
        }

        else {
            $foodOption = FoodOption::all();
        
            return view('UMS.dashboard.foodOption.AdminFoodOption', [
                'type' => 'foodOption',
                'style' => [
                    'admin/adminDashboard',
                    'admin/adminAnnouncement',
                    'admin/adminCustomer'
                ],
                'customers'=> $foodOption

            ]);
        }

        
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $owner = User::where('id', auth()->user()->id)->get();
        if($owner[0]->foodOption) {
            return redirect('/dashboard/foodOption');
        }

        else {
            return view('UMS.dashboard.foodOption.OwnerFoodOptionAdd', [
                'type' => 'foodOption',
                'style' => [
                    'admin/adminDashboard',
                    'owner/ownerDashboard',
                    'owner/ownerMenu',
                    'admin/adminAnnouncement',
                    'admin/adminCustomer',
                    'owner/ownerMenuList'
                ],
                'owner' => $owner,
                // 'test' => auth()->user()->id
                
            ]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'place_name' => 'required | unique:food_options',
            'type' => 'required',
            'phoneNumber' => 'required',
            // 'status' => 'required',
            'description' => 'required',
            'image' => 'image|file',
            'addressLine1' => 'required',
            'order' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        else {
            $validatedData['image'] = 'https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/food-restaurant-icon.png';
        }
        
        // $place_name = $request->place_name;
        $slug = Str::slug($request->place_name);

       

        
        // $slug = 'xyz';

        $owner_id = auth()->user()->id;

        $validatedData['owner_id'] = $owner_id;
        $validatedData['place_slug'] = $slug;
        //$validatedData['image'] = 'https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/food-restaurant-icon.png';

        // $slug = SlugService::createSlug(FoodOption::class, 'slug', $request->title);
        // $validatedData['place_slug'] = $slug;

        // dd($validatedData);

        FoodOption::create($validatedData);

        //opening Hour
        $foodOption_id = FoodOption::where('owner_id', $owner_id)->value('id');


        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

            foreach ($daysOfWeek as $day) {
                OpeningHours::create([
                    'dayOfTheWeek' => $day,
                    'foodOption_id' => $foodOption_id,
                    // Add other fields as needed
                ]);
            }
        
            // 6.034589, 116.119604
        $map['latitude'] = 6.034589;
        $map['longitude'] = 116.119604;
        $map['place_id'] = $foodOption_id;
        Map::create($map);
        // OpeningHours::create($openingHour);
        
        return redirect('dashboard/foodOption')->with('success', 'A place is created');
    }

    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(FoodOption::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
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
        if(auth()->user()->role == 'owner') {
            // $owner = User::where('id', auth()->user()->id)->get();
            // $foodOption = FoodOption::where('owner_id',  auth()->user()->id)->get();
            return view('UMS.dashboard.foodOption.OwnerFoodOptionEdit', [
                'type' => 'foodOption',
                'style' => [
                    'admin/adminDashboard',
                    'owner/ownerDashboard',
                    'owner/ownerMenu',
                    'admin/adminAnnouncement',
                    'admin/adminCustomer',
                    'owner/ownerMenuList'
                ],
                'foodOption' => $foodOption
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FoodOption $foodOption)
    {
        //
        $rules = [
            'place_name' => 'required|unique:food_options,place_name,' . $foodOption->id,
            'type' => 'required',
            'phoneNumber' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Example validation for image file
        ];
        
        $validatedData = $request->validate($rules);
        
        // Handle file upload
        if ($request->hasFile('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        
        // Update data in the database
        $owner_id = auth()->user()->id;
        $slug = Str::slug($request->place_name);
        $validatedData['owner_id'] = $owner_id;
        $validatedData['place_slug'] = $slug;
        
        // Use updateOrInsert to update existing record or insert a new one
        FoodOption::updateOrInsert(['owner_id' => $owner_id], $validatedData);
        

        //opening Hour
        return redirect('/dashboard/foodOption');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FoodOption $foodOption)
    {
        //
    }
}
