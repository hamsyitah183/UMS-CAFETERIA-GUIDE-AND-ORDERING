<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ShoppingCart;

use Illuminate\Http\Request;
use App\Http\Controllers\UserCartController;

class UserShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $carts = Cart::where('cart_id', auth()->user()->id)->get();

        // dd($carts);

        return view('UMS/showCart', [
            'type' => 'cart',
            'style' => [
                'UMS/wajib',
                'UMS/cart'
            ],
            'carts' => $carts

            
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
    public function show(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        
    }

    

    // public function deleteCart()
    // {}
}
