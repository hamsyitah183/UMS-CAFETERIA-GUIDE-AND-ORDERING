<?php

namespace App\Http\Controllers;

use App\Models\FoodOption;
use Illuminate\Http\Request;

class AdminFoodOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(auth()->user()->role == 'owner') {
            return app(OwnerFoodOptionController::class)->index();
        }
        
        else {
            $foodOption = FoodOption::all();
        
            return view('UMS.dashboard.foodOption.AdminFoodOption', [
                'type' => 'FoodOption',
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
        if(auth()->user()->role == 'owner') {
            return app(OwnerFoodOptionController::class)->create();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if(auth()->user()->role == 'owner') {
            return app(OwnerFoodOptionController::class)->store();
        }
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
