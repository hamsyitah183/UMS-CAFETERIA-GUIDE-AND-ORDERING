<?php

namespace App\Http\Controllers;

// Import the Request class from the Illuminate\Http namespace
use Illuminate\Http\Request as IlluminateRequest;
use App\Models\Request;

use Illuminate\Support\Str;


// Import the Request class from the App\Models namespace
use App\Models\Request as AppRequest;

class UserRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = auth()->user();
        return view('UMS.dashboard.request.userRequest', [
            'type' => 'Request',
            'style' => [
                'owner/owner',
                'admin/adminDashboard',
                'owner/ownerMenuList'
            ],
            'user' => $user
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
    public function store(IlluminateRequest $request)
    {
        //
        $validatedData = $request->validate([
            
            'place_name' => 'required',
            'question' => 'required',
            'phoneNumber' => 'required',
            'image' => 'file|image'
        ]);


        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['place_slug'] = Str::slug($validatedData['place_name']);

        Request::create($validatedData);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(AppRequest $Apprequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppRequest $Apprequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IlluminateRequest $request, AppRequest $Apprequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppRequest $Apprequest)
    {
        //
    }
}
