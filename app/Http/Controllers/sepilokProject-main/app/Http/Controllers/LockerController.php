<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LockerController extends Controller
{
    //
    public function viewLocker() {
        return view('locker');
    }

    public function lockerPost(Request $request) {
        $data = $request->validate([
            'lockerNumber' => ['required', 'integer'],
            'occupant' => ['required', 'string'],
            'lockerContact' => ['required', 'string'],
            'lockerStart' => ['required', 'date_format:Y-m-d\TH:i'],
            'lockerStatus' => ['required', 'string']
        ]);

        // to ensure no malicious people can display or store the actual code (html or php) or the input
        $data['lockerNumber'] = strip_tags($data['lockerNumber']);
        $data['occupant'] = strip_tags($data['occupant']);
        $data['lockerContact'] = strip_tags($data['lockerContact']);
        $data['lockerStart'] = strip_tags($data['lockerStart']);
        $data['lockerStatus'] = strip_tags($data['lockerStatus']);

        $data['user_ID'] = auth()->user()->id;
        

        $locker = Locker::create($data);

        Alert::success('Locker Added Successfully');

        return redirect(route('locker.lockerPost'));
    }

    public function getLocker(){
        $locker = Locker::all(); 

        //the view would get the data from the inventory table where the $inventory is passed to the inventory blade view to display them
        return view('locker', ['locker' => $locker]);
    }

    public function viewEditLocker(Locker $locker) {

         return view('editLocker', ['locker' => $locker]);

    }
    

    public function updateLocker(Locker $locker, Request $request) {
        $data = $request->validate([
            'lockerNumber' => ['required', 'integer'],
            'occupant' => ['required', 'string'],
            'lockerContact' => ['required', 'string'],
            'lockerStart' => ['required', 'date_format:Y-m-d\TH:i'],
            'lockerStatus' => ['required', 'string']
        ]);

        // to ensure no malicious people can display or store the actual code (html or php) or the input
        $data['lockerNumber'] = strip_tags($data['lockerNumber']);
        $data['occupant'] = strip_tags($data['occupant']);
        $data['lockerContact'] = strip_tags($data['lockerContact']);
        $data['lockerStart'] = strip_tags($data['lockerStart']);
        $data['lockerStatus'] = strip_tags($data['lockerStatus']);

        $locker->update($data);

        Alert::success('Locker Updated Successfully');

        return redirect(route('locker.getLocker'));
    }

    public function deleteLocker(Locker $locker) {

        $locker->delete();

        return redirect(route('locker.getLocker'));

    }
}
