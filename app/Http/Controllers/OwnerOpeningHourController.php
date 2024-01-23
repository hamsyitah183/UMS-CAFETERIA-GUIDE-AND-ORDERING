<?php

namespace App\Http\Controllers;

use App\Models\FoodOption;
use App\Models\OpeningHours;
use Illuminate\Http\Request;

class OwnerOpeningHourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');
        $places = FoodOption::where('owner_id', auth()->user()->id)->first();
        if($places) {
            // $openHours = OpeningHours::all()->where('foodOption_id', $place_id);
            return view('UMS.dashboard.openingHour.ownerOpeningHourView', [
                'type' => 'openingHour',
                'style' => [
                    'admin/adminDashboard',
                    'owner/ownerDashboard',
                    'owner/ownerOpeningHour'
                ],
                'openHours' => $places
            ]);
        }
        else {
            return redirect('dashboard/foodOption');
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OpeningHours $openingHour)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OpeningHours $openingHour)
    {
        //
        return view('UMS.dashboard.openingHour.ownerOpeningHourEdit', [
            'type' => 'openingHour',
            'style' => [
                'admin/adminDashboard',
                'owner/ownerDashboard',
                'admin/adminAnnouncementEdit'
            ],
            'openingHour' => $openingHour,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OpeningHours $openingHour)
    {
        //

       

        $validatedData['openTime'] = $request->openTime;
        $validatedData['closeTime'] = $request->closeTime;


        if($request->closed == 'on') {
            $validatedData['openTime'] = NULL;
            $validatedData['closeTime'] = NULL;
        }
        
        $validatedData['foodOption_id'] = $openingHour->foodOption_id;
        $validatedData['dayOfTheWeek'] = $openingHour->dayOfTheWeek;

        // dd($validatedData);

        OpeningHours::where('id', $openingHour->id)
                ->update($validatedData);

        return redirect('/dashboard/openingHour')->with('success', 'Opening Hour is successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OpeningHours $openingHour)
    {
        //
    }
}
