<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::where('id', auth()->user()->id)->first();
        return view('UMS.dashboard.profile.userViewProfile', [
            'type' => 'User profile',
            'style'=> [
                'owner/owner',
                'admin/adminDashboard',
                // 'owner/ownerDashboard',

                'owner/userProfile'
            ],
            'user'=> $user
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // 'admin/adminDashboard',
        // 'admin/adminAnnouncementEdit'
        $user = User::where('id', auth()->user()->id)->first();
        // dd($user);

        return view('UMS.dashboard.profile.UserEditProfile', [
            'style' => [
                'admin/adminDashboard',
                'admin/adminAnnouncementEdit'

            ],
            'type' => 'customer',
            'customer' => $user
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $user = User::where('id', auth()->user()->id)->first();

        $rules = [
            'name' => 'required|max:255',
            // 'slug' => 'required|unique:announcement',
            'username' => 'required',
            'email' => 'required',
            'no_phone' => 'required',
            'role' => 'required',
            'addressLine1' => 'required',
            'addressLine2' => 'required',
            'addressLine3' => 'required',
            'image' => 'image|file', // Adjust the mime types and max size as needed
        ];

        // dd($request);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        // if ($request->oldImage && Storage::exists($request->oldImage)) {
        //     Storage::delete($request->oldImage);
        // }

        $rules['role'] = $user->role;

        $validatedData = $request->validate($rules);



        User::where('id',$user->id )
                   ->update($validatedData);

        return redirect('/dashboard/profile')->with('success', 'Profile has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function editPassword(User $user) 
    {
        $user = User::where('id', auth()->user()->id)->first();
        // dd($user);

        return view('UMS.dashboard.profile.UserEditPassword', [
            'style' => [
                'admin/adminDashboard',
                'admin/adminAnnouncementEdit'

            ],
            'type' => 'customer',
            'customer' => $user
        ]);
    }

    public function changedPassword(Request $request, User $user)
    {
        //
        $user = User::where('id', auth()->user()->id)->first();

        $rules = [
            'password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ];

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Incorrect old password']);
        }
       
    

        $validatedData = $request->validate($rules);

        $validatedData['password'] = $rules['new_password'];

        User::where('id',$user->id )
        ->update($validatedData);

        return redirect('/dashboard/profile')->with('success', 'Password has been updated successfully.');
    }
}
