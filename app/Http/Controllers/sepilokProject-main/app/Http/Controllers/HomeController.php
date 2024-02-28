<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index() {

        if(Auth::id()){

            $usertype=Auth()->user()->usertype;
                if($usertype=='user'){
                    
                    return view('dashboard');
                }

                else if($usertype=='admin' || $usertype == 'staff')
                {
                    return view('admin.home');
                }

                else
                {
                    return redirect()->back();
                }

        }
    }

    public function showChart(){

        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
            if($usertype=='admin' || $usertype == 'staff') {
                $chartBar = app(ChartController::class)->visitorChart();

                return view('admin.home', $chartBar);
            }
            else if($usertype=='user'){
                return view('dashboard');
            }
            else
                {
                    return redirect()->back();
                }
        }

    }

    public function registerStaff(){
        return view('registerStaff');
    }
}
