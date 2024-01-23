
{{-- @dd($owners[0]->foodOption->orders[0]->user) --}}

@foreach ($owners as $owner)




<div class="heroes">
    <div class="hero">
        <div class="img">
            
            <img src="https://images.crowdspring.com/blog/wp-content/uploads/2023/05/16174534/bakery-hero.png" alt="" srcset="">
        </div>
    </div>

    <div class="profile">
        <div class="img">
            @if ($owner->foodOption && $owner->foodOption->image)
                @php
                $imageUrl = $owner->foodOption->image
                    ? (Str::startsWith($owner->foodOption->image, ['http://', 'https://'])
                        ? $owner->foodOption->image
                        : asset('storage/' . $owner->foodOption->image))
                    : asset('path/to/placeholder-image.jpg');
                @endphp
                <img src="{{ $imageUrl }}" alt="" srcset="">
            @else
                <img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/food-restaurant-icon.png" alt="" srcset="">
            @endif
        </div>
        <div class="information">
            @if ($owner->foodOption && $owner->foodOption->place_name)
                <h1 class="name">{{ $owner->foodOption->place_name }}</h1>
            @else
                <h1 class="name">No place name</h1>
            @endif

            @if ($owner->foodOption && $owner->foodOption->addressLine1)
                <p class="address"><i class="bi bi-geo-alt"></i>
                    {{ $owner->foodOption->addressLine1 }} 
            </p>
            @else
                
            @endif
        </div>
       
        <div class="information2">
            <p class="email"><i class="bi bi-envelope"></i>{{ $owner->email }}</p>
            <p class="no_phone"><i class="bi bi-telephone"></i>{{ $owner->noPhone }}</p>
            <p class="types">
                <i class="bi bi-shop"></i>Type: 
                @php
                    if($owner->foodOption && $owner->foodOption->type) {

                        if($owner->foodOption->type == 1) {
                            $place = 'Cafeteria';
                        }
                        elseif ($owner->foodOption->type == 2) {
                            # code...
                            $place = 'Kiosk';
                        }

                        elseif ($owner->foodOption->type == 3) {
                            # code...
                            $place = 'Vendor';
                        }
                    }
                    else {
                        $place = 'No place yet';
                    }
                    
                @endphp
                <b>{{ $place  }}</b>

            </p>
            <p class="dateJoined"><i class="bi bi-calendar"></i>{{ $owner->created_at }}</p>
        </p>
        </div>

        <div class="information3">
            <div class="boxes">
                <div class="box">
                    @if ($owner->foodOption && $owner->foodOption->reviewAndRating)
                        <p class="number">{{ $owner->foodOption->reviewAndRating->count() }}</p>  
                    @else
                        <p class="number">0</p>  
                    @endif
                    
                    Review
                </div>
                <div class="box">
                    @if ($owner->foodOption)
                        <p class="number">{{ $owner->foodOption->gallery->count() }}</p> 
                    @else
                        <p class="number">0</p>
                    @endif
                    Gallery
                </div>
                <div class="box">
                    @if ($owner->foodOption && $owner->foodOption->orders)
                        <p class="number">{{ $owner->foodOption->orders->count() }}</p>  
                    @else
                        <p class="number">0</p>  
                    @endif
                    
                    Order
                </div>
            </div>
        </div>
    </div>
</div>

{{-- about and announcement --}}
@include('UMS.dashboard.owner.OwnerProfile1')

{{-- gallery --}}
@include('UMS.dashboard.owner.OwnerProfile2')


{{-- menu --}}
@include('UMS.dashboard.owner.OwnerProfile3')

@endforeach

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
        });

        var swiper = new Swiper(".gallery", {
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
            clickable:true,
        },
        });

        $('.menus').slick();

        
        
      </script>