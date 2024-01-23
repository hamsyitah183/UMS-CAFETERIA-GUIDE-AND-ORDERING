@extends('UMS.dashboard.layouts.main')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>



   <!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>

@section('dash-content')
<div class="topContent">
    <div class="title">
        <i class="ri-restaurant-line"></i>
        <span class="text">Order Details</span>

        
    </div>

    

</div>
{{-- @dd($order->foodOption->map) --}}

<div class="content">
    <h1 class="orderId">Order ID: {{ $order->id }}</h1>
    <h2 class="customerNotes"><b>Customer notes: </b>{{ $order->order_notes }}</h2>

    <div class="orderProcess">
        <div class="order {{ ($order->status == 'Pending' || $order->status == 'Processed'  || $order->status == 'Completed') ? 'Pending' : ($order->status == 'Cancel' ? '' : '')  }}">
            <div class="number">
                1
            </div>

            <div class="explanation">
                Order is pending
                
            </div>
        </div>

        <div class="order  {{ ($order->status == 'Processed' || $order->status == 'Completed' ) ? 'Pending' : ($order->status == 'Cancel' ? '' : '')  }}">
            <div class="number">
                2
            </div>

            <div class="explanation">
                Order is processed
                
            </div>
        </div>

        <div class="order  {{ ( $order->status == 'Completed' ) ? 'Pending' : ($order->status == 'Cancel' ? '' : '')  }}">
            <div class="number">
                3
            </div>

            <div class="explanation">
                Order is completed
            </div>
        </div>

        <div class="order {{ ( $order->status == 'Completed' ) ? 'Pickup' : ($order->status == 'Cancel' ? 'Cancel' : '')  }}">
            <div class="number">
                4
            </div>

            <div class="explanation">
                @if ($order->status == 'Completed' || $order->status == 'Pending' || $order->status == 'Processed')
                    Order is ready to be pickup
                @elseif($order->status == 'Cancel')
                    Order is cancelled
                @endif
            </div>
        </div>
    </div>


    

</div>

<div class="content2">
    <div class="pickup">
        <div class="titles">
            <h2>Pick up location</h2> 
            <div class="direction">
                <h3 >
                    <a href="https://www.google.com/maps/dir//{{ $order->foodOption->map->latitude }},+{{ $order->foodOption->map->longitude }}/@6.0365741,116.0810002,13z/data=!4m6!4m5!1m0!1m3!2m2!1d116.122159!2d6.036469?entry=ttu" target="_blank">Direction 
                        <i class="ri-arrow-right-up-fill"></i>
                    </a>
                </h3>
                
            </div>
        </div>
        
        <div id="map"></div>
    </div>

    <div class="right">
        <div class="orderDetail">
            {{-- @dd($order->user) --}}
            <h2>Order details</h2>

            <p class="name"><span class="bold">Customer Name: </span>{{ $order->user->name }}</p>
            <p class="no_phone"><span class="bold">No. phone:</span> {{ $order->user->no_phone }}</p>
            <p class="totalOrder"><span class="bold">Total order:</span> RM {{ $order->total_price }}</p>
            <p class="pickup"><span class="bold">Pick up: </span>{{ $order->pickup_time }}</p>
        </div>

        
    </div>
</div>

<div class="orderList">
 <h1>Order list</h1>
 <table>
    <thead>
        <tr>
            <th>Items</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total Price</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($order->orderLine as $item)
        <tr>
            <td>
                <div class="item">
                    <div class="img">
                        @php
                            $imageUrl = $item->menu->image
                                ? (Str::startsWith($item->menu->image, ['http://', 'https://'])
                                    ? $item->menu->image
                                    : asset('storage/' . $item->menu->image))
                                : 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg'
                        @endphp
                        <img src="{{ $imageUrl }}" alt="" srcset="">
                    </div>

                    <div class="info">
                        <p class="category">{{ $item->menu->category }}</p>
                        <p class="name">{{ $item->menu->name }}</p>
                        <p class="notes">{{ $item->info }}</p>
                    </div>
                </div>
            </td>
            <td> {{ $item->quantity }} </td>
            <td> RM {{ $item->price }} </td>
            <td> RM {{ $item->quantity * $item->price }}</td>
        </tr>
        @endforeach
      
    </tbody>
 </table>
</div>

<script>
    var latitude = @json($order->foodOption->map->latitude);
    var longitude = @json($order->foodOption->map->longitude);

    var map = L.map('map').setView([latitude, longitude], 16);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);


// marker
var marker = L.marker([latitude, longitude]).addTo(map);
</script>
@endsection