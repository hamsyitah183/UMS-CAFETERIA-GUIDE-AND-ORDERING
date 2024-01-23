<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    //
    public function UMSRegister()
    {
        return view("UMS.register", ([
            'style' => 'style2'
        ]));
    }

    public function UMSStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:rfc|unique:users',
            'password' => 'required|min:5|max:255',
            'addressLine1' => 'required',
            'addressLine2' => 'required',
            'addressLine3' => 'required',
            'no_phone' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('sucess', 'Registration Success! Please Login');
    }
}
