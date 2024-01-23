<style>
    .editBtn {
        margin-top: 14px
    }
</style>


<div class="tableCart">
    <h3>My Cart</h3>
    <!-- <div class="line"></div> -->
    <table>
        <thead>
            <tr>
                <th>Remove</th>
                <th>Edit</th>
                <th>Products</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub-total</th>
                
            </tr>
        </thead>

        <tbody>
            @if ($carts)
                @foreach ($carts as $item)
              
                {{-- @dd(number_format( $item->price * $item->quanity , 2)) --}}
                {{-- @dd($item->quanity ) --}}
                <tr>
                    <td style="width: 10px">
                        {{-- <form action="/cart/delete/{{ $item->id }}" method="post" > --}}
                        <form action="/showCart/delete/{{ $item->id }}" method="get">
                            {{-- @method('DELETE') --}}
                            @csrf
                            
                            <button class="btn" type="submit" onclick="return confirm('Are you sure?')"><i class="bi bi-trash" ></i></a></button>

                        </form>

                        {{-- @dd($item->id)
                        {{-- <button class="btn"><a href={{ url('delete', $item->id) }}><i class="bi bi-trash"></i></a></button> --}}

                    </td>
                    <td>
                        <p class="btn editBtn"><a href="/editCart/view/{{ $item->id }}"><i class="bi bi-pencil"></i></a></p>
                    </td>
                    <td>
                        <div class="products">
                            <div class="img">
                                @php
                                // dd($item->menu->image);
                                    $imageUrl = $item->menu->image
                                        ? (Str::startsWith($item->menu->image, ['http://', 'https://'])
                                            ? $item->menu->image
                                            : asset('storage/' . $item->menu->image))
                                        : 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg'
                                @endphp
                                <img src="{{ $imageUrl }}" alt="" srcset="">
                            </div>
                            <div class="name">
                                <p>{{ $item->name }}</p>
                            </div>
                        </div>
                        <!-- <div class="product_desc">
                            <p>Please add more cheese</p>
                        </div> -->
                    </td>
                    <td>
                        RM {{ $item->price }}
                    </td>
                    <td>
                        
                        {{ $item->quantity }}
                    </td>

                    <td>
                       

                        RM {{ number_format( $item->price * $item->quantity , 2) }}
                    </td>
                    
                </tr>
                @endforeach
            @else
                <h1>Please add item</h1>
            @endif
           
        </tbody>
    </table>
    <div class="button">
        <button class="btn">Return to shop</button>
        <button class="btn">Update cart</button>
    </div>
</div>