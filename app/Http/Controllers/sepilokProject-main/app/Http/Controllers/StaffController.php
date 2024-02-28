<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
{
    //
    public function staffGet() {

        //this is to ensure that the table form would only display the data based on the usertype which is staff and return the data to the registerStaff
        $staff = User::where('usertype', 'staff')->get();
        
        return view('registerStaff', ['staff' => $staff]);
    }

    //display new staff form
    public function viewStaffForm() {
        return view('registerNew');
    }    

    //create new data to database when user submits the contact information
    public function registerPost(Request $request){
        $data = $request->validate([
            'staffName' => ['required', 'string'],
            'staffDOB' => ['required', 'string'],
            'staffGender' => ['required', 'string'],
            'staffRace' => ['required', 'string'],
            'staffContact' => ['required', 'string'],
            'staffAddress' => ['required', 'string'],
            'staffPosition' => ['required', 'string'],
            'staffHireDate' => ['required', 'string'],
            'userID' => ['required', 'integer']
        ]);

        // to ensure no malicious people can display or store the actual code (html or php) or the input
        $data['staffName'] = strip_tags($data['staffName']);
        $data['staffDOB'] = strip_tags($data['staffDOB']);
        $data['staffGender'] = strip_tags($data['staffGender']);
        $data['staffRace'] = strip_tags($data['staffRace']);      
        $data['staffContact'] = strip_tags($data['staffContact']);       
        $data['staffAddress'] = strip_tags($data['staffAddress']); 
        $data['staffPosition'] = strip_tags($data['staffPosition']);
        $data['staffHireDate'] = strip_tags($data['staffHireDate']);

        
        $data['user_ID'] = $data['userID'];
        
        // the $user would find the associated staffID with the userID from the users table so that the created information is connected to the selected staff based on their staffID and userID
        $user = User::find($data['user_ID']);
        $newStaff = $user->staff()->create($data);

        Alert::success('Staff Profile Added Successfully');

        return redirect(route('registerNew.registerPost'));
    }


    public function viewStaffInfo() {
        $user = Auth::user();

        //retrieve the staff information from the staffs table
        $staff = Staff::where('user_ID', $user->id)->first();

        return view('staff.profileStaff', compact('staff'));
    }

    public function viewEditStaff(Staff $staff){

        //view the edit page of the profile information
        return view('staff.editProfileStaff', compact('staff'));
    }

    public function updateStaffInfo(Staff $staff, Request $request){
        $data = $request->validate([
            'staffName' => ['required', 'string'],
            'staffDOB' => ['required', 'string'],
            'staffGender' => ['required', 'string'],
            'staffRace' => ['required', 'string'],
            'staffContact' => ['required', 'string'],
            'staffAddress' => ['required', 'string'],
            'staffPosition' => ['required', 'string'],
            'staffHireDate' => ['required', 'string'],
        ]);

        // to ensure no malicious people can display or store the actual code (html or php) or the input
        $data['staffName'] = strip_tags($data['staffName']);
        $data['staffDOB'] = strip_tags($data['staffDOB']);
        $data['staffGender'] = strip_tags($data['staffGender']);
        $data['staffRace'] = strip_tags($data['staffRace']);      
        $data['staffContact'] = strip_tags($data['staffContact']);       
        $data['staffAddress'] = strip_tags($data['staffAddress']); 
        $data['staffPosition'] = strip_tags($data['staffPosition']);
        $data['staffHireDate'] = strip_tags($data['staffHireDate']);

        $staff->update($data);

        Alert::success('Staff Profile Updated Successfully');

        return redirect(route('profileStaff.viewStaffInfo'));

    }

}
