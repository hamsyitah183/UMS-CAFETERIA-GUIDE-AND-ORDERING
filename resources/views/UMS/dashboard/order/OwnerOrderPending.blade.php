
<div class="orderPendingTable table">
    {{-- @dd($foodOption->orders->where('status', 'Pending') ) --}}
    @foreach ($foodOption->orders->where('status', 'Pending') as $item)
    {{-- @dd($item->orderLine) --}}
    <div class="item">
        <p class="date">{{ $item->created_at->format('h:i A') }}</p>
        <h2 class="orderId">Order ID: {{ $item->id }}</h2>
        
        <form action="/dashboard/order/pending/{{ $item->id }}" method="post">
            @csrf
            <div class="activity">
                <div class="accept yes" onclick="submitForm('acceptRadio{{ $item->id }}', 'Accept the order?')">
                    <input type="radio" name="accept" id="acceptRadio{{ $item->id }}" value="Processed">
                    <div class="button"><i class="ri-check-line"></i></div>
                </div>
                <div class="accept no" onclick="submitForm('notAcceptRadio{{ $item->id }}', 'Reject the order?')">
                    <input type="radio" name="accept" id="notAcceptRadio{{ $item->id }}" value="Cancel">
                    <div class="button"><i class="ri-close-line"></i></div>
                </div>
                <div class="accept view">
                    <div class="button" onclick="togglePopup({{ $item->id }})"><i class="ri-eye-line"></i></div>
                </div>
            </div>
        </form>
            <div class="popup" id={{ $item->id }}>
                <div class="overlay">
                    <div class="content">
                        <div class="header">
                            <div class="close-btn"  onclick="togglePopup({{ $item->id }})">&times;</div>
                            <h1>Order {{ $item->id }}
                            </h1>
                            <p style="padding: 10px"><b>Customer notes: </b>{{ $item->order_notes }}</p>

                        </div>
                        <div class="information">
                            @foreach ($item->orderLine as $product)
                            <div class="item">
                                @php

                                    if(!$product->menu->image) {
                                        $product->menu->image = 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg';
                                    }

                                    
                                @endphp
                                <div class="img">
                                    
                                    <img src="{{ $product->menu->image }}" alt="" srcset="">
                                </div>
                                <div class="info">
                                    <h3 class="name">{{ $product->menu->name }}</h3>
                                    <p class="quantity">x {{ $product->quantity }}</p>
                                    @if ($product->info)
                                        <p class="note">{{ $product->info }}</p>
                                    @else
                                        
                                    @endif
                                </div>
                            </div>
                            @endforeach

                            <div class="payment">
                                <h3>Payment</h3>
                                <div class="img">
                                    @php
                                        $imageUrl = $item->payment->image
                                            ? (Str::startsWith($item->payment->image, ['http://', 'https://'])
                                                ? $item->payment->image
                                                : asset('storage/' . $item->payment->image))
                                            : asset('path/to/placeholder-image.jpg');
                                    @endphp
                                    <img src="{{ $imageUrl}}" alt="" srcset="" style="height: 250px">
                                </div>
                                <p><b>No ref</b>: {{ $item->payment->payment_ref_no }}</p>
                            </div>
                            
                            <!-- <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg0ZEAByUkyqBy3KA2XqgOY81nFk84IScMXOw95FEGAbTRcXTaBN8w0eF_S19Wo90ZGQtCXMGL8U1WLWU5-VH1DjHvIMVofxYq-si0Mq-ePzJP2jZCAj_hi1KiwujOMr_txRi6raO6JQF2aEuTIH-9rqylSPEBNJRvc_7ywnzKwQ5cP_DdbBWnb4n_YQFY/s16000/orange-woman-with-packages-in-shopping-cart.png" alt="" srcset=""> -->
                            
                        </div>
                    </div>
                </div>
            </div>
        

    </div>
    @endforeach

    
</div>