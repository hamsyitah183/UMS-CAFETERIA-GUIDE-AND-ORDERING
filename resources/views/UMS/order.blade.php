<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    @for ($i = 0; $i < count($style); $i++)
        <link rel="stylesheet" href={{ asset('css/'.$style[$i].'.css')}}>
     @endfor
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">


</head>
<body>
    <!-- header -->
    @include('UMS.partials.navBar')

    @if (session()->has('success'))
    <div id="successMessage" class="success">
        {{ session('success') }}
        <i class="ri-close-line" onclick="fadeOut('successMessage')"></i>
    </div>

    @elseif (session()->has('delete'))
        <div id="deleteMessage" class="success delete">
            {{ session('delete') }}
            <i class="ri-close-line"  onclick="fadeOut('deleteMessage')"></i>
        </div>

    @elseif (session()->has('message'))
    <div class="success delete message"  id="messageMessage">
        {{ session('message') }}
        <i class="ri-close-line"  onclick="fadeOut('messageMessage')"></i>
    </div>

    <script>
        function fadeOut(elementId) {
            var element = document.getElementById(elementId);
            var opacity = 1;
    
            // Start fading out over a duration of 1 second
            var fadeEffect = setInterval(function () {
                if (opacity > 0) {
                    opacity -= 0.1;
                    element.style.opacity = opacity;
                } else {
                    clearInterval(fadeEffect);
                    element.style.display = 'none'; // Hide the element when it's fully faded out
                }
            }, 100); // Adjust the interval for smoother animation
        }
    </script>

    @endif
    

    <?php
        $breakfast = [];
        $lunch = [];
        $drink = [];
    ?>
  
    @foreach ($menus as $menu)
        @if ($menu->category == 'Breakfast')
            @php
                $breakfast[] = $menu
            @endphp

        @elseif ($menu->category == 'Lunch')
            @php
                $lunch[] = $menu
            @endphp

        @elseif ($menu->category == 'Drink')
            @php
                $drink[] = $menu
            @endphp
        @endif
    @endforeach

   

    <section class="swiper hero" id="orderHero" >
        <div class="gallery swiper-wrapper">
            @if(count($place->gallery)>0)
                @foreach ($place->gallery as $item)
                    <div class="image swiper-slide">
                        @php
                        $imageUrl = $item->image
                            ? (Str::startsWith($item->image, ['http://', 'https://'])
                                ? $item->image
                                : asset('storage/' . $item->image))
                            : asset('path/to/placeholder-image.jpg');
                        @endphp
                        <img src="{{ $imageUrl }}" alt="" srcset="">
                    </div>
                @endforeach
                
            @else
                <div class="image swiper-slide">

                    <img src="https://images.pexels.com/photos/15147745/pexels-photo-15147745/free-photo-of-slices-of-cakes-in-close-up-photography.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
                    <h3>hello</h3>
                </div>
            @endif
            

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>

    </section>

    <section>
        <div class="searchHeader">
            <h4 class="place_name">{{ $place->place_name }}</h4>
            
            <div class="information">
                <p class="openingHour">
                    <?php
                        $currentDay = \Carbon\Carbon::now()->format('l');
                    ?>

                    @foreach ($place->openingHour as $item)
                        @if ($item->dayOfTheWeek == $currentDay)
                            <i class="bi bi-clock"></i>
                            <span>{{ \Carbon\Carbon::parse($item->openTime)->format('g:i A') }} - {{ \Carbon\Carbon::parse($item->closeTime)->format('g:i A') }}</span>
                       
                            
                        @endif
                    @endforeach
                    
                </p>
                <p class="address"> 
                    <i class="bi bi-geo-alt"></i>
                    <span>
                        <a href="">
                            {{ $place->addressLine1}}
                        </a>
                    </span>
                </p>

                <p class="service">
                    <i class="bi bi-bag"></i>
                    <span><a href="">Pick up</a></span>
                </p>
            </div>
        </div>
    </section>

    <section class="searchs">
        <div class="searchBoxs">
            <div class="searchInput">
                <input type="text" name="Search" id="" placeholder="Nasi goreng">
                <button type="submit">Search</button>
            </div>

            <ul id="menu">
                <li><a href="#breakfast">Breakfast</a></li>

                <li><a href="#lunch">Lunch</a></li>

                <li><a href="#drink">Drink</a></li>


            </ul>
        </div>

        <div class="order">
            @include('UMS.orderBreakfast')

            <div class="line"></div>
            <div class="foodList" id="lunch">
                @foreach ($lunch as $item)
                <?php 
                    if(!($item->image)) $item->image = 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg'   
                ?>
                 @php
                 $imageUrl = $item->image
                     ? (Str::startsWith($item->image, ['http://', 'https://'])
                         ? $item->image
                         : asset('storage/' . $item->image))
                     : asset('path/to/placeholder-image.jpg');
                @endphp
                    <div class="item">
                        <div class="foodItem">
                            
                            <img src="{{ $imageUrl }}" alt="" srcset=""  onclick="togglePopup({{ $item->id }})">
                            <div class="information">
                                <p>{{ $item->name }}</p>
                                <p class="price">RM {{ $item->price }}</p>
                                
                                <form action="{{ url('addCart', $item->id) }}" method="POST">

                                    @csrf 
           
                                   <div class="ordering">
                                       <input type="number" value="1" min='1' class="form-comtrol" name="quantityOfCart" >
                                       <br>
                                       <input type="submit" value="Add to cart" class="btn button">
                                   </div>
           
                               </form>
                            </div>
        
                        </div>
        
                        <div class="popup" id="{{ $item->id }}">
                            <div class="overlay">
                                <div class="content">
                                    <div class="header">
                                        <div class="close-btn" onclick="togglePopup({{ $item->id }})">&times;</div>
                                        <h1>{{ $item->name }}</h1>
                                    </div>
                                    <div class="information">
                                        <img src="{{ $imageUrl }}" alt="">
                                        <p class="description">{{ $item->description }}</p>
                                        <p class="price">RM <span>{{ $item->price }}</span></p>

                                        
                                    </div>
                                    <form action="{{ url('addCart', $item->id) }}" method="POST">

                                        @csrf 
               
                                       <div class="ordering" style="flex-direction: row; gap: 10px; place-content: end; margin-left: 40px;">
                                           <input type="number" value="1" min='1' class="form-comtrol" name="quantityOfCart" >
                                           <br>
                                           <input type="submit" value="Add to cart" class="btn button" style="width: fit-content; padding: 10px">
                                       </div>
               
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>

            <div class="line"></div>

            <div class="foodList" id="drink">
                @foreach ($drink as $item)
                <?php 
                    if(!($item->image)) $item->image = 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg'   
                ?>
                 @php
                 $imageUrl = $item->image
                     ? (Str::startsWith($item->image, ['http://', 'https://'])
                         ? $item->image
                         : asset('storage/' . $item->image))
                     : asset('path/to/placeholder-image.jpg');
                @endphp
                    <div class="item">
                        <div class="foodItem" >
                            
                            <img src="{{ $imageUrl }}" alt="" srcset="" onclick="togglePopup({{ $item->id }})">
                            <div class="information">
                                <p>{{ $item->name }}</p>
                                <p class="price">RM {{ $item->price }}</p>
                                <form action="{{ url('addCart', $item->id) }}" method="POST">

                                    @csrf 
           
                                   <div class="ordering">
                                       <input type="number" value="1" min='1' class="form-comtrol" name="quantityOfCart" >
                                       <br>
                                       <input type="submit" value="Add to cart" class="btn button">
                                   </div>
           
                               </form>
                            </div>
        
                        </div>
        
                        <div class="popup" id="{{ $item->id }}">
                            <div class="overlay">
                                <div class="content">
                                    <div class="header">
                                        <div class="close-btn" >&times;</div>
                                        <h1>{{ $item->name }}</h1>
                                    </div>
                                    <div class="information">
                                        <img src="{{ $imageUrl }}" alt="" onclick="togglePopup({{ $item->id }})">
                                        <p class="description">{{ $item->description }}</p>
                                        <p class="price">RM <span>{{ $item->price }}</span></p>

                                        
                                    </div>
                                    <form action="{{ url('addCart', $item->id) }}" method="POST">

                                        @csrf 
               
                                       <div class="ordering" style="flex-direction: row; gap: 10px; place-content: end; margin-left: 40px;">
                                           <input type="number" value="1" min='1' class="form-comtrol" name="quantityOfCart" >
                                           <br>
                                           <input type="submit" value="Add to cart" class="btn button" style="width: fit-content; padding: 10px">
                                       </div>
               
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            
            
        </div>

        

    </section>

    <div class="container">
        <a href="#orderHero" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line"></i>
        </a>
     </div>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper(".hero", {
                spaceBetween: 30,
                effect: "fade",
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                autoplay: {
                    delay: 1500,
                    disableOnInteraction: false,
                },
                loop : true,
            });
        });
    </script>

<script>
     $(document).ready(function () {
        // Add a click event listener to each list item
        $('#menu li').click(function () {
            // Remove the "active" class from all list items
            $('#menu li').removeClass('active');

            // Add the "active" class to the clicked list item
            $(this).addClass('active');
        });
    });

    function togglePopup(popupId) {
    var popup = document.getElementById(popupId);
    if (popup) {
        popup.classList.toggle('active');
    }
}
</script>

<script src={{ asset('js/main.js') }}></script>
</body>
</html>