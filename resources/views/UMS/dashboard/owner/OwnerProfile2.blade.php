@php
 

    // dd($owners[0]->foodOption->order->order)
@endphp

<div class="owners2 flex">
    <div class="galleries">
       
        <h1>Gallery</h1>
        <div class="line"></div>
        @if ($owner->foodOption && $owner->foodOption->gallery)
            <div class="swiper gallery">
                <div class="swiper-wrapper items">
                    @foreach ($owner->foodOption->gallery as $gallery)
                        <div class="swiper-slide item">
                            @php
                            $imageUrl = $gallery->image
                                ? (Str::startsWith($gallery->image, ['http://', 'https://'])
                                    ? $gallery->image
                                    : asset('storage/' . $gallery->image))
                                : asset('path/to/placeholder-image.jpg');
                            @endphp
                            <img src="{{ $imageUrl }}" alt="">
                            <div class="imgDesc">
                                <p>{{ $gallery->title }}</p>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="swiper-slide item">
                        <img src="https://cdn0-production-images-kly.akamaized.net/3RZxxR43-zW-NhwMBetL4z2W7dk=/0x138:2048x1292/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3166919/original/012001300_1593576450-shutterstock_1542386222.jpg" alt="">
                        <div class="imgDesc">
                            <p>Lorem ipsum dolor sit amet consectetur.</p>
                        </div>
                    </div> --}}

                    {{-- <div class="swiper-slide item">
                        <img src="https://cdn0-production-images-kly.akamaized.net/3RZxxR43-zW-NhwMBetL4z2W7dk=/0x138:2048x1292/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3166919/original/012001300_1593576450-shutterstock_1542386222.jpg" alt="">
                        <div class="imgDesc">
                            <p>Lorem ipsum dolor sit amet consectetur.</p>
                        </div>
                    </div> --}}
                </div>
                
                <div class="swiper-pagination"></div>
            </div>
        @else
            
        @endif
    </div>

    <div class="order">
        <h1>Order history</h1>
        {{-- @dd($owners[0]->foodOption->orders) --}}

        <div class="line"></div>

        <div class="orderList">
            @if ($owner->foodOption && $owner->foodOption->orders)
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($owner->foodOption->orders as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->id }}</td>
                            <td>
                                <div class="customer">
                                    <div class="name">
                                        <p>{{ $item->user->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->status }}</td>
                        </tr>

                        
                    @endforeach
                   
                    
                </tbody>
            </table>
            @else
                <p>No order</p>
            @endif
        </div>
    </div>
</div>