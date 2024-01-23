<?php

namespace App\Http\Controllers;

use App\Models\FoodOption;
use App\Models\ReviewAndRating;
use App\Http\Requests\StoreReviewAndRatingRequest;
use App\Http\Requests\UpdateReviewAndRatingRequest;

class ReviewAndRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FoodOption $foodOption)
    {
        //
        $review = ReviewAndRating::where('place_id', $foodOption->id)->get();

        $averages = [];
        foreach ($review as $r) {
            $averages[] = $r->rate;
            
            
        }

        $average = count($averages) > 0 ? number_format(array_sum($averages) / count($averages), 1) : 0;

        dd($average);
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
            'average' => $average,
            'foodOptionId' => $foodOption->id,
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
    public function store(StoreReviewAndRatingRequest $request, FoodOption $foodOption)
    {
        //
        $validatedData = $request->validate([
            'rate' => 'required',
            'message' => 'required',
            'name' => 'required'
        ]);

        // if(auth()) {
        //     $validatedData['user_id'] = auth()->user()->id;
        // }

        // else {
        //     $validatedData['user_id'] = null;
        // }

        // $validatedData['place_id'] = $foodOption->id;
        
        // ReviewAndRating::create($validatedData);
        $validatedData['user_id'] = auth()->user() ? auth()->user()->id : null;

    // Add food option ID to the data
        $validatedData['place_id'] = $foodOption->id;
        
        ReviewAndRating::create($validatedData);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReviewAndRating $reviewAndRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReviewAndRating $reviewAndRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewAndRatingRequest $request, ReviewAndRating $reviewAndRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReviewAndRating $reviewAndRating)
    {
        //
    }
}
