<?php

namespace App\Http\Controllers;

use App\Models\FoodOption;
use App\Models\ReviewAndRating;

use Illuminate\Http\Request;

class ReviewIndividualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FoodOption $foodOption)
    {
        //
        $review = ReviewAndRating::where('place_id', $foodOption->id)->paginate(4);

        return view('UMS.reviewAndRating', [
            'type' => 'Home',
            'style' => [
                'UMS/wajib',
                'UMS/homepage',
                'UMS/review'
                // 'admin/adminDashboard',
                // 'homepage'
            ],
            'reviews' => $review,
            'foodOptionId' => $foodOption->id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, FoodOption $foodOption)
    {
        //
        $validatedData = $request->validate([
            'rate' => 'required',
            'message' => 'required',
            // 'name' => 'required'
        ]);

        
        $validatedData['user_id'] = auth()->user() ? auth()->user()->id : null;

        $validatedData['name'] = auth()->check() ? auth()->user()->username : 'guest';

       

    // Add food option ID to the data
        $validatedData['place_id'] = $foodOption->id;

        // dd($validatedData);
        
        ReviewAndRating::create($validatedData);

        return redirect()->back()->with('success', 'Review submitted successfully!');
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
    public function update(Request $request, FoodOption $foodOption)
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
