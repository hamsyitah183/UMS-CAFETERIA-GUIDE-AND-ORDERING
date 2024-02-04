<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Feedback;
use App\Models\Reply;
use Illuminate\Http\Request;

class UserFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(auth()->user()->role == 'admin') {
            $feedback = Feedback::all();
        }
        
        else {
            $feedback = Feedback::where('user_id', auth()->user()->id)->get();
        }

        return view('UMS.dashboard.feedback.UserFeedbackList', [
            'style' => [
                'admin/adminDashboard',
                'owner/ownerDashboard',
            
                'admin/adminCustomerList',
                'owner/ownerFeedbackList'
            ],
            'type' => 'feedback',
            'feedbacks' => $feedback
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('UMS.dashboard.feedback.UserFeedbackAdd', [
            'style' => [
                'admin/adminDashboard',
                'owner/ownerDashboard',
                'owner/ownerMenu',
                'admin/adminAnnouncement',
                'admin/adminCustomer',
                'owner/ownerMenuList'
            ],
            'type' => 'feedback',
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'message' => 'required',
            'title' => 'required'
        ]);

        $user = User::find(auth()->user()->id);

        $validatedData['user_id'] = $user->id;
 
        $validatedData['type'] = auth()->user()->role;
        $validatedData['email'] = $user->email;

        Feedback::create($validatedData);

        return redirect('/dashboard/feedback')->with('success', 'Thank you for the feedback');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
        return view('UMS.dashboard.feedback.UserFeedbackView', [
            'style' => [
                'admin/adminDashboard',
                'owner/ownerDashboard',
                'admin/admincustomerView',
                'owner/ownerFeedbackView'
            ],
            'type' => 'feedback',
            'feedback' => $feedback
        ]);
    }

    public function reply(Request $request, Feedback $feedback)
    {
        $validatedData = $request->validate([
            'message' => 'required',
        ]);


        $user = User::find(auth()->user()->id);

        $validatedData['user_id'] = $user->id;
        $validatedData['feedback_id'] = $feedback->id;

        Reply::create($validatedData);

        return redirect('/dashboard/feedback/'. $feedback->id);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
