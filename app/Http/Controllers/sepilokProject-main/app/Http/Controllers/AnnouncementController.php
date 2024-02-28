<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderFormRequest;
use App\Models\Announcement;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class AnnouncementController extends Controller
{
    //

    public function visitorAnn() {

        $sliders = Announcement::where('annStatus', '0')->get();
 
        return view('announcementpage', compact('sliders'));
    }

    public function viewAnnouncement() {

        $sliders=Announcement::all();
        return view('annStaff', compact('sliders'));
    }

    public function annPost(SliderFormRequest $request){
        
        $validatedData = $request->validated();

        if($request->hasFile('annImg')){
            $file = $request->file('annImg');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('img', $filename); //chech back later - upload to the img folder
            $validatedData['annImg'] = "img/$filename";
        }

        
        $validatedData['user_ID'] = auth()->user()->id;

        $validatedData['annStatus'] = $request->annStatus == true ? '1':'0';

        Announcement::create([
            'annTitle' =>$validatedData['annTitle'],
            'annDesc' =>$validatedData['annDesc'],
            'annImg' =>$validatedData['annImg'],
            'annStatus' =>$validatedData['annStatus'],
            'user_ID' =>$validatedData['user_ID'],
        ]);

        Alert::success('Announcement Added Successfully', 'Slider Has Added Successfully');


        return redirect(route('annStaff.annPost'));
    }

    public function viewEditAnn(Announcement $sliders) {

        return view('editAnn', compact('sliders'));
    }

    public function updateAnn(SliderFormRequest $request, Announcement $sliders) {

        $validatedData = $request->validated();

        if($request->hasFile('annImg')){

            $destination = $sliders->annImg;
            if(File::exists($destination)){
                File::delete($destination);
            }
            //delete the old image

            $file = $request->file('annImg');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('img', $filename); //chech back later - upload to the img folder
            $validatedData['annImg'] = "img/$filename";

            //upload the new image to the file for the update
        }

        $validatedData['annStatus'] = $request->annStatus == true ? '1':'0';

        Announcement::where('annID', $sliders->annID)->update([
            'annTitle' =>$validatedData['annTitle'],
            'annDesc' =>$validatedData['annDesc'],
            'annImg' =>$validatedData['annImg'] ?? $sliders->annImg, //
            'annStatus' =>$validatedData['annStatus'],
        ]);

        Alert::success('Announcement Updated Successfully', 'Slider Has Updated Successfully');


        return redirect(route('annStaff.annPost'));
    }

    public function deleteAnn(Announcement $sliders) {

        if($sliders->count() > 0){ //at least 1 record is there

            $destination = $sliders->annImg;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $sliders->delete();

            Alert::success('Announcement Deleted Successfully', 'Slider Has Deleted Successfully');
            return redirect(route('annStaff.annPost'));

        }

        Alert::warning('Something Went Wrong');
        
        return redirect(route('annStaff.annPost'));
    }
}
