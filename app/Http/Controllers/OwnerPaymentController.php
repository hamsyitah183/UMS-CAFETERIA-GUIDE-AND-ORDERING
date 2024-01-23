<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\FoodOption;
use Illuminate\Http\Request;

class OwnerPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');
        $payments = Payment::where('place_id', $place_id)->get();
        return view('UMS.dashboard.payment.ownerPaymentView', [
            'style' =>[
                'admin/adminDashboard',
                'owner/ownerDashboard',
            
                'admin/adminCustomerList',
                'owner/ownerFeedbackList'
            ],
            'payments' => $payments,
            'type' => 'payment'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('UMS.dashboard.payment.ownerPaymentAdd', [
            'type' => 'openingHour',
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
            'paymentType' => 'required',
            'description' => 'required'
        ]);

        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');

        $validatedData['place_id'] = $place_id;

        Payment::create($validatedData);

        return redirect('dashboard/payment')->with('success', 'A menu is added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
        return view('UMS.dashboard.payment.ownerPaymentEdit', [
            'type' => 'openingHour',
            'style' => [
                'admin/adminDashboard',
                'owner/ownerDashboard',
                'admin/adminAnnouncementEdit'
            ],
            'payment' => $payment,
            // 'openingHour' => $openingHour,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
        $validatedData = $request->validate([
            'paymentType' => 'required',
            'description' => 'required'
        ]);

        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');

        $validatedData['place_id'] = $place_id;

        Payment::where('id', $payment->id)->update($validatedData);

        return redirect('dashboard/payment')->with('success', 'A menu is added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
        Payment::destroy($payment->id);

        return redirect('/dashboard/payment')->with('delete', 'Customer has been deleted');
    }
}
