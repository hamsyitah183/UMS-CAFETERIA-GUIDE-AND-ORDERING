<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;


class ContactController extends Controller
{
    //
    public function contactTourist() {
        return view('contact');
    }

    //create new data to database when user submits the contact information
    public function contactPost(Request $request){
        $data = $request->validate([
            'contactType' => ['required', 'string'],
            'contactMessage' => ['required', 'string'],
            'contactCategory' => ['required', 'string']
        ]);

        // to ensure no malicious people can display or store the actual code (html or php) or the input
        $data['contactType'] = strip_tags($data['contactType']);
        $data['contactMessage'] = strip_tags($data['contactMessage']);
        $data['contactCategory'] = strip_tags($data['contactCategory']);

        $data['user_ID'] = auth()->user()->id;

        $newContact = Contact::create($data);

        Alert::success('Your Feedback is Added Successfully');

        return redirect(route('contact.contactPost'));
    }

    //Display the contact data from database
    public function contactGet() {

        //making sure that the user is logged in
        $user_ID = Auth::id();

        //the contact data will be retrieved based on the logged in user (eg: abigail logged in and the content of the contact based of abigail's id would be retrieved)
        $contact = Contact::where('user_ID', $user_ID)->get();

        return view('contact', ['contact' => $contact]);
    }

    public function contactStaff(){


        $contact = Contact::all();
        
        return view('viewContact', ['contact' => $contact]);
    }

    public function editContact(Contact $contact){
        
        return view('editContact', compact('contact'));
    }

    public function updateContact(Contact $contact, Request $request){
        $data = $request->validate([
            'contactType' => ['required', 'string'],
            'contactMessage' => ['required', 'string'],
            'contactCategory' => ['required', 'string']
        ]);

        // to ensure no malicious people can display or store the actual code (html or php) or the input
        $data['contactType'] = strip_tags($data['contactType']);
        $data['contactMessage'] = strip_tags($data['contactMessage']);
        $data['contactCategory'] = strip_tags($data['contactCategory']);

        $contact->update($data);

        Alert::success('Your Feedback is Updated Successfully');

        return redirect(route('contact.contactGet'));
    }

    public function deleteContact(Contact $contact) {

        $contact->delete();

        return redirect()->route('contact.contactGet');

    }
}
