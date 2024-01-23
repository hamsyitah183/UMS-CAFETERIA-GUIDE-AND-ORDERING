{{-- $customer->shoppingCart->cart --}}
@php
    $carts = optional($customer->shoppingCart)->cart ?? [];
    // $carts = $customer->shoppingCart->cart;

    $totals = [];

    foreach ($carts as $cart) {
        // Calculate the total for each cart item and add it to the $totals array
        $totals[] = $cart->price * $cart->quantity;
    }

   
    // Output the totals array
    
@endphp

<div class="orderCart">
    <h1>My cart</h1>
    <div class="line"></div>

    
    <div class="cartContent">

       @if ($carts)
       @foreach ($carts as $key => $cart)
       <div class="item">
           <div class="left">
               <div class="img">
                   @php
                   // dd($cart->menu->image);
                       $imageUrl = $cart->menu->image
                           ? (Str::startsWith($cart->menu->image, ['http://', 'https://'])
                               ? $cart->menu->image
                               : asset('storage/' . $cart->menu->image))
                           : 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg'
                   @endphp
                   <img src="{{ $imageUrl }}" alt="" srcset="">
               </div>

               
           </div>

           <div class="right">
               <div class="left">
                   <h2 class="foodName">{{ $cart->name }}</h2>
                   <p class="quantity">x <span class="highlight">{{ $cart->quantity }}</span></p>
                   <p class="price">RM {{ $totals[$key] }}</p>
               </div>

               <div class="right">
                   <form action="">
                       <button type="submit"><i class="ri-delete-bin-line"></i></button>
                   </form>
               </div>
               
           </div>
       </div>

       @endforeach

       @else 
       No items !
       @endif
        
    </div>


    <div class="activity">
        <button class="btn"><a href="/showCart">Show cart</a></button>
    </div>
</div>