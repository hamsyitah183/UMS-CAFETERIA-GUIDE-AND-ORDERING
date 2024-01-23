<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\FoodOption;
use App\Models\UserPayment;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;



class CartController extends Controller
{
    //
    public function addCart(Request $request, $id) {


        if(auth()->check()) {
            //return to same page
            $user = auth()->user();

            $shoppingCart = ShoppingCart::where('user_id', $user->id)->first();

            //menu find the id
            $product = Menu::find($id);


            //menu to foodOption
            $place_id = $product->FoodOption->id;

            if(!$shoppingCart) {
                ShoppingCart::create([
                    'place_id' => $place_id,
                    'user_id' => $user->id,
                    'status' => 'not_complete'
                ]);

                $shoppingCart = ShoppingCart::where('user_id', $user->id)->first();

                $cart = New Cart;

                $cart->cart_id = $shoppingCart->id;

                $cart->product_id = $product->id;

                $cart->name = $product->name;

                $cart->price = $product->price;

                $cart->quantity = $request->input('quantityOfCart');

                // dd($request->all());

                $cart->save();

                return redirect()->back()->with('message', 'Product add to cart succesfully');
            }

           else {

                if($shoppingCart->place_id != $place_id) {
                    return redirect()->back()->with('message', 'Cannot order more than one place');
                }

               else {
                    $cart = New Cart;

                    $cart->cart_id = $shoppingCart->id;

                    $cart->name = $product->name;

                    $cart->product_id = $product->id;

                    $cart->price = $product->price;

                    $cart->quantity = $request->input('quantityOfCart');

                    // dd($request->all());

                    $cart->save();

                    return redirect()->back()->with('success', 'Product add to cart succesfully');
               }
           }
        } 

        else {
            return redirect('/login');
        }
    }

    public function addCartTime(Request $request, $id) {
        $shoppingCart = ShoppingCart::where('id', $id)->first();

        $validatedData['pickup_time'] = $request->delivery_time;
        $validatedData['place_id'] = $shoppingCart->place_id;
        $validatedData['user_id'] = $shoppingCart->user_id;
        $validatedData['status'] = $shoppingCart->status;


        ShoppingCart::where('id', $id)
            ->update($validatedData);

        return redirect('/checkout');
    }


    public function showCart() {

        $user = auth()->user();

        $cart = Cart::where('phoneNumber', $user->no_phone);

        return view('UMS/showCart', [
            'type' => 'cart',
            'style' => [
                'UMS/wajib',
                'UMS/cart'
            ],

            'cart' => $cart
        ]);
    }

    public function editCart(Request $request, $id) {
        
        // dd($id);
        // $shoppingCart = ShoppingCart::where('id', $id)->first();

        $carts = Cart::where('id', $id )->first();

        // dd($carts);

        return view('UMS.editCart', [
            'type' => 'Edit cart',
            'style' => [
                'UMS/wajib',
                'UMS/editCart'
            ],
            'carts' => $carts
         ]);
    }

    public function editCartData(Request $request, $id) {
        
        // $shoppingCart = ShoppingCart::where('id', $id)->first();
    

        $carts = Cart::where('id', $id)->first();

        $validatedData['product_id'] = $carts->product_id;
        $validatedData['name'] = $carts->name;
        $validatedData['price'] = $carts->price;
        $validatedData['quantity'] = $request->quantity;
        $validatedData['info'] = $request->info;


        Cart::where('id', $id)
            ->update($validatedData);

        return redirect('/showCart');
    }

    public function deleteCart($id) {

        

        $data = Cart::find($id);

        $data->delete();

        // Cart::destroy($id);

        // return redirect()->back();

        $cart = Cart::find($id);

        if ($cart) {

            $cart->delete();
        }

        return redirect()->back();
    }


    public function order(Request $request, $id)
    {
        $shoppingCart = ShoppingCart::where('id', $id)->first();

        $validatedData['pickup_time'] = $shoppingCart->delivery_time;
        $validatedData['place_id'] = $shoppingCart->place_id;
        $validatedData['user_id'] = $shoppingCart->user_id;
        $validatedData['status'] = $shoppingCart->status;
        $validatedData['pickup_time'] = $shoppingCart->pickup_time;
        $validatedData['order_notes'] = $request->order_notes;

        ShoppingCart::where('id', $id)
            ->update($validatedData);

        return redirect('/payment');

    }

    public function payment()
    {
        return view('UMS.payment', [
            'type' => 'Edit cart',
            'style' => [
                'UMS/wajib',
                'UMS/editCart'
            ],
            // 'carts' => $carts
        ]);
    }

   public function paymentStore(Request $request)
   {
        $user = auth()->user();
        $shoppingCart = ShoppingCart::where('user_id', $user->id)->first();

        $carts = Cart::where('cart_id', $shoppingCart->id)->get();

        $total_value = [];
        $quantity = [];

        foreach($carts as $cart) {

            $total_value[] = $cart->price * $cart->quantity;

            $quantity[] = $cart->quantity;
        }

        // dd($quantity);


        $validatedData = $request->validate([
            'image' => 'file|mimes:jpeg,png,svg,pdf',
            'payment_ref_no' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        
         
        $orderData = ([
            'place_id' => $shoppingCart->place_id,
            'user_id' => $shoppingCart->user_id,
         
            'quantity' => array_sum($quantity),
            'pickup_time' => $shoppingCart->pickup_time,
            'total_price' => array_sum($total_value),
            'delivery_type' => 'pickup',
            'order_notes' => $shoppingCart->order_notes,
            'status' => 'Pending',
        ]);

        Order::create($orderData);

        $order = Order::where('user_id', auth()->user()->id)
        ->where('total_price', array_sum($total_value))
        ->latest()->first();

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['total_value'] = array_sum($total_value);
        $validatedData['place_id'] = $shoppingCart->foodOption->id;
        $validatedData['order_id'] = $order->id;

        UserPayment::create($validatedData);

        //update order status
        $updateOrderData['place_id'] = $order->place_id;
        $updateOrderData['user_id'] = $order->user_id;
        $updateOrderData['quantity'] = $order->quantity;
        $updateOrderData['pickup_time'] = $order->pickup_time;
        $updateOrderData['delivery_type'] = $order->delivery_type;
        $updateOrderData['total_price'] = $order->total_price;
        $updateOrderData['order_notes'] = $order->order_notes;
        $updateOrderData['status'] = 'Pending';

        Order::where('id', $order->id)->update($updateOrderData);

        foreach($carts as $cart) {
            OrderLine::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'name' => $cart->name,
                'price' => $cart->price,
                'quantity' => $cart->quantity,
                'info' => $cart->info,
            ]);
        }

        ShoppingCart::destroy($shoppingCart->id);
        
        return redirect('/UMS/cart/payment/' . $order->id);
   }



   public function invoice(Order $order) {
    // return 'hello';
    // dd($order);
        return view('UMS.paymentCart', [

            'style'=> [
                'UMS/wajib',
                'UMS/paymentCart',

            ],
            'orders' => $order
        ]);
   }

   public function viewInvoice(Order $order) {
        return view('UMS.invoice.generateInvoice', [
            'order' => $order
        ]);
   }

   public function generateInvoice(Order $order) {
        $data = ['order' => $order];
        $todayDate = Carbon::now()->format('d-m-Y h:i A');

        $pdf = Pdf::loadView('UMS.invoice.generateInvoice', $data);
        return $pdf->download('invoice'.$order->id.'-'.$todayDate. '.pdf');
   }
}
