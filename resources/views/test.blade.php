@php
    

    use App\Models\Order;


    $carts = Order::where('place_id', 4)->get();

    
@endphp

Order list for place option number 4
<ul>
@foreach ($carts as $cart)
    <li>{{ $cart->created_at }}</li>

    <li>
       @dd($cart->orderLine[0]->menu)
    </li>
@endforeach
</ul>