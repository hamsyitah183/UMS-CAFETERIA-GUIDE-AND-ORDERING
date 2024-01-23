<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    public function UMSLogin()
    {
        return view("UMS.login");
    }


    public function UMSAuthenticate(Request $request){

        $credential = $request->validate([
            'username' => 'required|min:3|max:255',
            'password' => 'required'
        ]);

        if(Auth::attempt($credential)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
