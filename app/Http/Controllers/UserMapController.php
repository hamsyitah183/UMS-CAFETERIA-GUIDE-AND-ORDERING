<?php

namespace App\Http\Controllers;

use App\Models\Map;
// use Illuminate\View\View;
use App\Models\FoodOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserMapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(auth()->foodOption());
        
        if(auth()->user()->role == 'owner') {
            // $id = auth()->user()->id;

            $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');
            // if($place_id) {
            //     $map = Map::where('place_id', $place_id)->first();
                
            //     if($map) {
            //         return view('UMS.dashboard.map.OwnerMapView', [
            //             'type' => 'announcement',
            //             'style' => [
            //                 'admin/adminDashboard',
            //                 'owner/ownerDashboard',
            //                 'owner/ownerMapView'
            //             ],
                        
            //             'map' => $map
            //         ]);
            //     }

            //     else {
            //         return redirect('dashboard/map/create');
            //     }
            // }
            // else {
            //     return redirect('dashboard/foodOption');
            // }
            $map = Map::where('place_id', $place_id)->first();
                
                if($map) {
                    return view('UMS.dashboard.map.OwnerMapView', [
                        'type' => 'map',
                        'style' => [
                            'admin/adminDashboard',
                            'owner/ownerDashboard',
                            'owner/ownerMapView'
                        ],
                        
                        'map' => $map
                    ]);
                }
        }
        
    }
    // return view('UMS.dashboard.map.OwnerMapView', [
    //     'type' => 'map',
    //     'style' => [
    //         'admin/adminDashboard',
    //         'owner/ownerDashboard',
    //         'owner/ownerMapView'
    //     ],
    //     'map' => $map,


    /**r
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    //     if(auth()->user()->role == 'owner') {
    //         // $id = auth()->user()->id;

    //         $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');
    //         if($place_id) {
    //             return view('UMS.dashboard.map.OwnerMapAdd', [
    //             'type' => 'map',
    //             'style' => [
    //                 'admin/adminDashboard',
    //                 'owner/ownerDashboard',
    //                 'owner/ownerMapView'
    //             ]
    //         ]);

               
    //         }

    //         else {
    //             return redirect('/dashboard');
    //         }
            
    //     }
    //     // return view('UMS.dashboard.map.OwnerMapAdd', [
    //     //     'type' => 'map',
    //     //     'style' => [
    //     //         'admin/adminDashboard',
    //     //         'owner/ownerDashboard',
    //     //         'owner/ownerMapView'
    //     //     ]
    //     // ]);
    // }

    /**
     * Store a newly created resource in storage.
     */



     public function create()
     {
         // Check if the user is an owner and has a FoodOption
        //  $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');

        //  $map = Map::where('place_id', $place_id)->first();

        //  return view('UMS.dashboard.map.OwnerMapAdd', [
        //     'type' => 'announcement',
        //     'style' => [
        //         'admin/adminDashboard',
        //         'owner/ownerDashboard',
        //         'owner/ownerMapView'
        //     ],
            
        //     'map' => $map
        // ]);
         
     }
     
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
            
        ]);

        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');

        $validatedData['place_id'] = $place_id;

        Map::create($validatedData);

        return redirect('dashboard/map')->with('success', 'A location is added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Map $map)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Map $map)
    {
        //
        return view('UMS.dashboard.map.OwnerMapEdit', [
            'type' => 'map',
            'style' => [
                'admin/adminDashboard',
                'owner/ownerDashboard',
                'owner/ownerMapView'
            ],
            'map' => $map
        ]);
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Map $map)
    {
        //
        $validatedData = $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
            
        ]);

        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');

        $validatedData['place_id'] = $place_id;

        Map::where('place_id', $place_id)->update($validatedData);

        return redirect('dashboard/map')->with('success', 'A location is updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Map $map)
    {
        //
    }

    public function test()
    {
        return 'hi';
    }
}
