@extends('UMS.layout.main')

@section('container')
<!-- hero -->
<section class="hero" id="hero">
    <div class="hero__container container">
        <h1 class="big__title">
            {{ $place->place_name }}
        </h1>
        <h3 class="small__title">menu</h3>
        <h2 class="medium__title">Fuel Your Studies: <span class="highlight">Discover</span> Our <br><span class="highlight">Student-Friendly</span> Menu</h2>
    </div>
</section>

<!-- menu -->
<section class="menu" id="menu">
    <div class="menu__container container ">
        
        
        
        @if (count($menus)>0)
        <div class="breakfast category swiper mySwiper">
            <h2 class="medium__title">Breakfast</h2>

            <div class="list__food swiper-wrapper">
                @foreach ($menus as $menu)
                @if ($menu->category == 'Breakfast')
                
                <?php 
                    if(!($menu->image)) $menu->image = 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg'   
                ?>
                
                <div class="foods swiper-slide">
                    @php
                    $imageUrl = $menu->image
                        ? (Str::startsWith($menu->image, ['http://', 'https://'])
                            ? $menu->image
                            : asset('storage/' . $menu->image))
                        : asset('path/to/placeholder-image.jpg');
                    @endphp
                    
                    <div class="detail" onclick="togglePopup()">
                        <img src="{{ $imageUrl }}" alt="" srcset="">
                        <h3>{{ $menu->name }}</h3>

                        <p class="paragraph">{{ $menu->description }}</p>

                    </div>
                    <h2>RM {{ $menu->price }}</h2>
                    
                </div>

                

                @endif

                @endforeach


            </div>
            
            <div class="swiper-pagination"></div>

            @foreach ($menus as $menu)
            @if ($menu->category == 'Breakfast')
                <?php 
                    if(!($menu->image)) $menu->image = 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg'  ; 
                ?>
            @endif
            
            @endforeach
        </div>
        
        
        
        

        <div class="line"></div>

        <div class="breakfast category swiper mySwiper">
            <h2 class="medium__title">Lunch</h2>

            <div class="list__food swiper-wrapper">
                @foreach ($menus as $menu)
                @if ($menu->category == 'Lunch')
                
                <?php 
                    if(!($menu->image)) $menu->image = 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg'   
                ?>
                
                <div class="foods swiper-slide">
                    
                    
                    <div class="detail">
                        @php
                    $imageUrl = $menu->image
                        ? (Str::startsWith($menu->image, ['http://', 'https://'])
                            ? $menu->image
                            : asset('storage/' . $menu->image))
                        : asset('path/to/placeholder-image.jpg');
                 @endphp
                        <img src="{{ $imageUrl }}" alt="" srcset="">
                        <h3>{{ $menu->name }}</h3>

                        <p class="paragraph">{{ $menu->description }}</p>

                    </div>
                    <h2>RM {{ $menu->price }}</h2>
                    
                </div>

                @endif

                @endforeach


            </div>
            
            <div class="swiper-pagination"></div>
        </div>

        <div class="line"></div>


        <div class="breakfast category swiper mySwiper">
            <h2 class="medium__title">Drink</h2>

            <div class="list__food swiper-wrapper">
                @foreach ($menus as $menu)
                @if ($menu->category == 'Drink')
                
                <?php 
                    if(!($menu->image)) $menu->image = 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg'   
                ?>
                
                <div class="foods swiper-slide">
                    @php
                    $imageUrl = $menu->image
                        ? (Str::startsWith($menu->image, ['http://', 'https://'])
                            ? $menu->image
                            : asset('storage/' . $menu->image))
                        : asset('path/to/placeholder-image.jpg');
                 @endphp
                    
                    <div class="detail">
                        <img src="{{ $imageUrl }}" alt="" srcset="">
                        <h3>{{ $menu->name }}</h3>

                        <p class="paragraph">{{ $menu->description }}</p>

                    </div>
                    <h2>RM {{ $menu->price }}</h2>
                    
                </div>

                @endif

                @endforeach


            </div>
            
            <div class="swiper-pagination"></div>
        </div>
            
        @else

        <h3 class="" style="text-align: center">None</h3>
            
        @endif

        
    </div>
</section>
<!-- popup -->

    
@endsection

@section('menuSwiper')
<script>
    var swiper = new Swiper(".category", {
       slidesPerView: 3,
       spaceBetween: 70,
    pagination: {
      el: ".swiper-pagination",
      dynamicBullets: true,
      clickable:true,
    },
  });


function togglePopup() {
    document.querySelector('.popup').classList.toggle('active');
}
  
  </script>
@endsection