<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use App\Models\OwnerPost;
use App\Models\FoodOption;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    //
    public function index(Request $request)
    {
        if(auth()->user()->role == 'admin') {
            return view('UMS.dashboard.adminDashboard', [
                'type' => 'Dashboard',
                'active' => 'active',
                'style' => ['admin/adminDashboard'],
            ]);
        }
        elseif(auth()->user()->role == 'owner') {
            
            return view('UMS.dashboard.adminDashboard', [
                'type' => 'Dashboard',
                'style' => [
                    'admin/adminDashboard',
                    'owner/ownerDashboard',
                    'owner/owner'
                ],
                'owners' => User::where('id', auth()->user()->id)->get(),
                'announcements' => Announcement::latest()->get(),
            ]);
            // return redirect()->action([UserDashboardController::class, 'owner']);
        }
        elseif(auth()->user()->role == 'customer') {

            $foodOptions = FoodOption::select('food_options.id', 'food_options.owner_id', 'food_options.type', 'food_options.place_name', 'food_options.place_slug', 'food_options.image', 'food_options.description', 'food_options.phoneNumber', 'food_options.addressLine1', 'food_options.QR_CODE', 'food_options.order', 'food_options.created_at', 'food_options.updated_at', DB::raw('COALESCE(SUM(review_and_ratings.rate), 0) as total_ratings'))
            ->leftJoin('review_and_ratings', 'food_options.id', '=', 'review_and_ratings.place_id')
            ->groupBy('food_options.id', 'food_options.owner_id', 'food_options.type', 'food_options.place_name', 'food_options.place_slug', 'food_options.image', 'food_options.description', 'food_options.phoneNumber', 'food_options.addressLine1', 'food_options.QR_CODE', 'food_options.order', 'food_options.created_at', 'food_options.updated_at')
            ->orderBy('total_ratings', 'desc')
            ->get();

            $post = OwnerPost::where('category', 'Promo')->where('status','Ongoing')->inRandomOrder()
            ->take(1)
            ->first();


            $todayDate = Carbon::now()->format('Y-m-d');
                
            // $order = Order::when($request->date != null, function($q) use ($request) {
                            
            //             return  $q->whereDate('created_at', $request->date);
            //             }, function ($q) use ($todayDate) {
                            
            //                 $q->whereDate('created_at', $todayDate);
            //             })

            //             ->when($request->status != null, function($q) use ($request) {
                        
            //             return  $q->where('status', $request->status);

                        
            //             });
                
            // return $order;
            
            return view('UMS.dashboard.customerDashboard', [
                'type' => 'Dashboard',
                'style' => [
                    'admin/adminDashboard',
                    'customer/customerDashboard'
                ],
                'customer' =>  User::where('id', auth()->user()->id)->first(),
                'foodOptions' => $foodOptions,
                'post' => $post,
                // 'order' => $order
            ]);
        }
    }

    public function owner()
    {
        return 'hello';
    }

    public function menu()
    {
        if(auth()->user()->role == 'owner') {
            $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');
            $category = Menu::latest()->where('place_id', $place_id)->get();
            return view('UMS.dashboard.menu.OwnerMenuHome', [
                'type' => 'menu',
                'style' => [
                    'admin/adminDashboard',
                    'owner/ownerDashboard'
                ],
                'category' => $category
            ]);
        }
    }
}
