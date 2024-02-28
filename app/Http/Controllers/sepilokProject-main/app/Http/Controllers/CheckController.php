<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\Check;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class CheckController extends Controller
{
    //
    public function viewCheck(){

        return view('check');
    }


    public function checkPost(Request $request){

            $data = $request->validate([
                'checkIn' => ['required', 'date_format:H:i'], 
                'checkOut' => ['required', 'date_format:H:i'], 
                'checkDate' => ['required', 'date']
            ]);
    
            // to ensure no malicious people can display or store the actual code (html or php) or the input
            $data['checkIn'] = strip_tags($data['checkIn']);
            $data['checkOut'] = strip_tags($data['checkOut']);
            $data['checkDate'] = strip_tags($data['checkDate']);

            $user_ID = Auth::id();

            $staff = Staff::where('user_ID', $user_ID)->first();
            
            $data['staffID'] = $staff->staffID;

            $check = $staff->check()->create($data);

            Alert::success('Checked In Successfully');
    
            return redirect(route('check.checkPost'));
    }

    public function viewCheckInfo(){

        $user = Auth::user();

        //retrieving the data associated with the logged in staff and from the checks table
        // $check = Check::where('user_ID', $user->id)->first();
        // if use Check model, it would go to the checks table to find the user_ID
        // based on the authenticated logged in user (eg.: user_ID = 4)
        // a mistake of my part

        $checks = Staff::where('user_ID', $user->id)->first();
        $check = $checks->check;
        
        // by using the Staff model, it would check the staffs table where the staffID
        // has the user_ID of the authenticated logged in user (eg.: staffID, user_ID == 4)
        // so in this case the user_ID ==4 so it is contained and connected to the staffID in the staffs table
        // through the staffs table, it goes to the Staff model in the check() relationship (relationship Staff w Check)
        // through check(), it would retrieve the data associated with the staffID 

        return view('viewCheck', compact('check'));

    }

    public function viewEditCheck(Check $check){
        
        return view('editCheck', compact('check'));
    }

    public function updateEditCheck(Check $check, Request $request){

        $data = $request->validate([
            'checkIn' => ['required', 'date_format:H:i'], 
            'checkOut' => ['required', 'date_format:H:i'], 
            'checkDate' => ['required', 'date']
        ]);

        // to ensure no malicious people can display or store the actual code (html or php) or the input
        $data['checkIn'] = strip_tags($data['checkIn']);
        $data['checkOut'] = strip_tags($data['checkOut']);
        $data['checkDate'] = strip_tags($data['checkDate']);

        $check->update($data);

        Alert::success('Check In Updated Successfully');

        return redirect(route('viewCheck.viewCheckInfo'));

    }

    public function deleteCheck(Check $check) {

        $check->delete();

        return redirect(route('viewCheck.viewCheckInfo'));

    }

}
