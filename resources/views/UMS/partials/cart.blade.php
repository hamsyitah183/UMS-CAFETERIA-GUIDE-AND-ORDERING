@php

    use App\Models\Cart;
    use App\Models\ShoppingCart;

    use App\Models\Menu;


    $user = auth()->user();

    $Shoppingcart_id = ShoppingCart::where('user_id', $user->id)->value('id');

    $carts = Cart::where('cart_id', $Shoppingcart_id)->get();

    
    $total = [];

    foreach ($carts as $cart) {
        # code...
        $total[] = $cart->quantity * $cart->price;
    }
    
    $sub_total = array_sum($total);
    

@endphp


<li class="dropdown__item">
    <div class="nav__link">
        <div class="icon-cart">
            <i class="ri-shopping-cart-line"></i>
            <span class="quantity">{{ $carts->count() }}</span>
        </div>
    </div>

    <div class="dropdown__menu checkCart">
        <div class="item__contents" >

            
            
            {{-- <span class="quantity">{{ $count }} items</span> --}}

            <div>
                <span class="total">Subtotal: </span> <span class="price">RM {{ $sub_total }}</span>
                
            </div>

            
        </div>

        <div class="items">
            
            @foreach ($carts as $item)
                
                <div class="item" style="margin-top: 30px">
                    <div class="detail">
                        @php

                        if(!$item->menu->image) {
                            $item->menu->image = 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg';
                        }

                        $imageUrl = $item->menu->image
                            ? (Str::startsWith($item->menu->image, ['http://', 'https://'])
                                ? $item->image
                                : asset('storage/' . $item->menu->image))
                            : 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg';
                        @endphp
                        <img src="{{ $item->menu->image }}" alt="">
                    </div>

                    <div class="prices" style="top: 0px;">
                        <p>{{ $item->name }}</p>
                        <p><span class="bold">Qty:</span> <span class="qty">{{ $item->quantity }}</span></p>
                        <p><span class="bold">Price:</span> <span class="price">{{ $item->price }}</span></p>
                    </div>
                </div>
            @endforeach

          


            
            
        </div>

        <div class="button">
            <button type="submit" class="btn"><a href="/showCart"><i class="ri-shopping-cart-fill"></i> Check Cart</a></button>
        </div>

    </div>
  </li>