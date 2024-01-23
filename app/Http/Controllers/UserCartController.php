<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $shopping_cart = ShoppingCart::where('user_id', auth()->user()->id)->first();
        $carts = Cart::where('cart_id', $shopping_cart->id)->get();

        // dd($carts);

        return view('UMS/showCart', [
            'type' => 'cart',
            'style' => [
                'UMS/wajib',
                'UMS/cart'
            ],
            'carts' => $carts, 
            'shopping_cart' => $shopping_cart
            
        ]);
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
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
        $data = Cart::find($cart->id);

        $data->delete();

        return redirect('/showCart')->with('delete', 'The product is deleted');
    }

    public function deleteCart($id) 
    {
        $data = Cart::find($id);

        $data->delete();

        return redirect('/showCart')->with('delete', 'The product is deleted');
    } 


    public function checkOut()
    {
        if(auth()->check()) {

            $shopping_cart = ShoppingCart::where('user_id', auth()->user()->id)->first();
            $carts = Cart::where('cart_id', $shopping_cart->id)->get();

            // dd($carts);

            return  view('UMS.checkOut',[
                'style' => [
                    'UMS/wajib',
                    'UMS/cart',
                    'UMS/checkOut'
                ],
                'type' => 'Checkout',
                'shopping_cart'=> $shopping_cart
            ]);
        }

        else {
            return redirect('/login');
        }
    }
}
