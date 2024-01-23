<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('UMS.dashboard.owner.AdminOwner', [
            'style' => [
                'admin/adminDashboard',
                'admin/adminAnnouncement',
                'admin/adminCustomer'

            ],
            'type' => 'owner',
            'owners'=> User::where('role', 'owner')->latest()->paginate(6)
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // 'slug' => 'required|unique:announcement',
            'username' => 'required',
            'email' => 'required',
            'no_phone' => 'required',
            'role' => 'required',
            'addressLine1' => 'required',
            'addressLine2' => 'required',
            'addressLine3' => 'required',

        ]);

        $validatedData['password'] = bcrypt('12345');

        User::create($validatedData);

        return redirect('dashboard/owner')->with('success', 'An owner is created');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $owner)
    {
        
        return view('UMS.dashboard.owner.AdminOwnerView', [
            'style' => [
                'admin/adminAnnouncement',
                'admin/adminDashboard',
                
                'admin/adminCustomer',
                'admin/adminCustomerView',
                'admin/adminOwnerView'
            ],
            'type' => 'owner',
            'owner' => $owner
            
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $owner)
    {
        //
        return view('UMS.dashboard.owner.AdminOwnerEdit', [
            'style' => [
                'admin/adminDashboard',
                'admin/adminAnnouncementEdit'

            ],
            'type' => 'customer',
            'owner' => $owner
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $owner)
    {
        //
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

        ];

        $rules['role'] = $owner->role;

        $validatedData = $request->validate($rules);



        User::where('id',$owner->id )->update($validatedData);

        return redirect('/dashboard/owner/')->with('success', 'Owner has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $owner)
    {
        //
        User::destroy($owner->id);
        return redirect('/dashboard/owner/')->with('success', 'An owner is deleted ');
    }
}
