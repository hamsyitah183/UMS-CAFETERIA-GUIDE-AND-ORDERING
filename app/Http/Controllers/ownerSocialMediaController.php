<?php

namespace App\Http\Controllers;

use App\Models\FoodOption;
use App\Models\socialMedia;
use Illuminate\Http\Request;

class ownerSocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');
        $socialMedia = socialMedia::where('place_id', $place_id)->get();
        return view('UMS.dashboard.social.ownerSocialView', [
            'style' =>[
                'admin/adminDashboard',
                'owner/ownerDashboard',
            
                'admin/adminCustomerList',
                'owner/ownerFeedbackList'
            ],
            'payments' => $socialMedia,
            'type' => 'payment'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('UMS.dashboard.social.ownerSocialAdd', [
            'type' => 'social media',
            'style' => [
                'admin/adminDashboard',
                'owner/ownerDashboard',
                'admin/adminAnnouncementEdit'
            ],
            // 'openingHour' => $openingHour,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'socialType' => 'required',
            'link' => 'required',
            'name' => 'required'
        ]);

        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');

        $validatedData['place_id'] = $place_id;
        $validatedData['type'] = $validatedData['socialType'];

        socialMedia::create($validatedData);

        return redirect('dashboard/media')->with('success', 'A social is added');
    }

    /**
     * Display the specified resource.
     */
    public function show(socialMedia $socialMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(socialMedia $media)
    {
        //
        return view('UMS.dashboard.social.ownerSocialEdit', [
            'type' => 'openingHour',
            'style' => [
                'admin/adminDashboard',
                'owner/ownerDashboard',
                'admin/adminAnnouncementEdit'
            ],
            'payment' => $media,
            // 'openingHour' => $openingHour,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, socialMedia $media)
    {
        //
        $validatedData = $request->validate([
            'paymentType' => 'required',
            'link' => 'required',
            'name' => 'required',

        ]);

        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');

        $updated['place_id'] = $place_id;
        $updated['type'] = $validatedData['paymentType'];
        $updated['link'] = $validatedData['link'];
        $updated['name'] = $validatedData['name'];



        socialMedia::where('id', $media->id)->update($updated);

        return redirect('dashboard/media')->with('success', 'A media is updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(socialMedia $media)
    {
        //
        socialMedia::destroy($media->id);

        return redirect('/dashboard/media')->with('delete', 'Social has been deleted');
    }
}
