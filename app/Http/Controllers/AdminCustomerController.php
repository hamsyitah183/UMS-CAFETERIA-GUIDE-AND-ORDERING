<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('UMS.dashboard.customer.AdminCustomer', [
            'style' => [
                'admin/adminDashboard',
                'admin/adminAnnouncement',
                'admin/adminCustomer'

            ],
            'type' => 'customer',
            'customers'=> User::where('role', 'customer')->latest()->paginate(6)
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
            'image' => 'image|file'
        ]);
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['password'] = bcrypt('12345');

        User::create($validatedData);

        return redirect('dashboard/customer')->with('success', 'A uses is created');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $customer)
    {
        //
        return view('UMS.dashboard.customer.AdminCustomerView', [
            'style' => [
                'admin/adminDashboard',
                'admin/adminAnnouncement',
                'admin/adminCustomer',
                'admin/adminCustomerView'

            ],
            'type' => 'customer',
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $customer)
    {
        //
        return view('UMS.dashboard.customer.AdminCustomerEdit', [
            'style' => [
                'admin/adminDashboard',
                'admin/adminAnnouncementEdit'

            ],
            'type' => 'customer',
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $customer)
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

        $rules['role'] = $customer->role;

        $validatedData = $request->validate($rules);



        User::where('id',$customer->id )
                   ->update($validatedData);

        return redirect('/dashboard/customer')->with('success', 'Customer has been updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $customer)
    {
        //
        // User::destroy($user->username);

        User::destroy($customer->id);

        return redirect('/dashboard/customer')->with('delete', 'Customer has been deleted');
    }
}
