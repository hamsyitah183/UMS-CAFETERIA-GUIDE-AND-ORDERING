<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\FoodOption;
use Illuminate\Http\Request;

class OwnerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = auth()->user();

        if ($user->role == 'owner') {
            $foodOption = FoodOption::where('owner_id', $user->id)->first();
        
            if ($foodOption) {
                return view('UMS.dashboard.order.OwnerOrderList', [
                    'type' => 'Order',
                    'style' => [
                        'admin/adminAnnouncement',
                        'admin/adminDashboard',
                        'owner/ownerOrderList'
                    ],
                    'foodOption' => $foodOption
                ]);
            } else {
                return redirect('dashboard/foodOption');
            }
        } 
        
        
    }

    public function acceptOrder(Request $request, Order $order)
    {
       $validatedData['status'] = $request->accept;
       Order::where('id', $order->id)->update($validatedData);

       return redirect('/dashboard/owner')->with('delete', 'You cancel this order');
    }

    public function order()
    {
        $user = auth()->user();

        if($user->role == 'owner') {
            $foodOption = FoodOption::where('owner_id', $user->id)->first();

            // dd($foodOption->orders);
            if($foodOption) {
                return view('UMS.dashboard.order.OwnerOrder', [
                    'type' => 'Order',
                    'style' => [
                        'admin/adminAnnouncement',
                        'admin/adminDashboard',
                        'owner/ownerOrderList',
                        'owner/orderHome'
                    ],
                    'foodOption' => $foodOption
                ]);
            }
            else {
                return redirect('/dashboard/foodOption');
            }
        } 
        elseif ($user->role == 'customer') {
            $orders = Order::where('user_id', $user->id)->get();
            // dd($orders);
            return view('UMS.dashboard.order.CustomerOrder', [
                'type' => 'Order',
                'style' => [
                    'admin/adminAnnouncement',
                    'admin/adminDashboard',
                    'owner/ownerOrderList'
                ],
                'orders' => $orders
            ]);
        }  
    }

    public function orderPending(Request $request, Order $order)
    {
        $validatedData['status'] = $request->accept;
        Order::where('id', $order->id)->update($validatedData);

        return redirect('/dashboard/order');
    }

    public function orderProcessed(Request $request, Order $order)
    {
        $validatedData['status'] = $request->accept;

        Order::where('id', $order->id)->update($validatedData);
        $phonenumber = "+60143290092";
        $name = $order->user->name;
        $email = $order->user->email;
        $orderInfo = '*Orders ID:* ' . $order->id . "\n" . "*Order notes:* " . $order->order_notes . "\n";
        $text = '*Total Price:* RM' . $order->total_price . "\n" .'*Orders:*' . "\n" ;

        if($request->accept == 'Processed') {
            $message = 'Your order is completed. Please come pick up your order on ' . $order->pickup_time;
        }

        elseif($request->accept == 'Cancel') {
            $message = 'Your order is cancelled. Sorry for the incovenience';
        }

        foreach ($order->orderLine as $item) {
            $text .= "\t" . '*Name:* ' . $item->name . "\n \t" . '*Quantity:* ' . $item->quantity .  " \n \t*Price:* RM" . $item->price . " \n \t*Notes:* " . $item->info  . "\n \n";
        }

        $whatsappMessage =
            "*Name:* " . $name .   "\n" .
            $orderInfo .
            "*Email:* " . $email . "\n" .
            "*Message:* " . $message . "\n" .
            $text;

        $url = "https://wa.me/+6{$order->user->no_phone}?text=" . urlencode($whatsappMessage);
        return redirect()->away($url);


    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
        // $orders = Order::where('id', $order->id)->first();
        return view('UMS.dashboard.order.OrderDetails', [
            'type' => 'Order',
            'style' => [
                'admin/adminDashboard',
                'owner/OrderDetails'
            ],
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
