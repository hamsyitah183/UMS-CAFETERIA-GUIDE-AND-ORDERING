<div class="menu">
    <div class="titles">
        <h1>Menu</h1>
        <p class="date">23 dec 2023</p>
    </div>

    <div class="line"></div>

    @php
        if($owner->foodOption && $owner->foodOption->menu) {
            $breakfasts = $owner->foodOption->menu->where('category', 'Breakfast')->toArray();

            $lunchs =  $owner->foodOption->menu->where('category', 'Lunch')->toArray();

            $drinks =  $owner->foodOption->menu->where('category', 'Drink')->toArray();
        }

        else {
            $breakfasts = [
                [
                    'none',
                    'image' => 'NULL',
                    'name' => 'no name yet',
                    'price' => 'none'
                ]
            ];

            $lunchs = [
                [
                    'none',
                    'image' => 'NULL',
                    'name' => 'no name yet',
                    'price' => 'none'
                ]
            ];

            $drinks = [
                [
                    'none',
                    'image' => 'NULL',
                    'name' => 'no name yet',
                    'price' => 'none'
                ]
            ];

           
        }

        // dd($image);
        
    @endphp

    <div class="swiper body">
        <div class="swiper-wrapper menus">
            <div class="swiper-slide">
                <h1>Breakfast</h1>
                <div class="contents">

                    
                    
                    @foreach ($breakfasts as $index => $breakfast)
                        
                        <div class="food">
                            <div class="img">
                                
                                
                               @if($breakfast) 
                                    @if ($breakfast['image'] == 'NULL')
                                        
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQihCQgZa4NQhg2aMeP1hRGApIXvKoq6IH_AnLILn3xpA&s" alt="" srcset="">

                                    @else
                                        @php
                                        $imageUrl = $breakfast['image']
                                            ? (Str::startsWith($breakfast['image'], ['http://', 'https://'])
                                                ? $breakfast['image']
                                                : asset('storage/' . $breakfast['image']))
                                            : asset('path/to/placeholder-image.jpg');
                                        @endphp
                                        <img src="{{ $imageUrl }}" alt="" srcset="">
                                    @endif
                               

                               @else {
                                    <img src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQihCQgZa4NQhg2aMeP1hRGApIXvKoq6IH_AnLILn3xpA&s">
                               }

                               @endif

                               
                            </div>
                            <div class="name">
                                {{-- @dd($breakfast['name']) --}}
                                {{ $breakfast['name'] }}
                            </div>
                            <div class="price">
                                RM {{ $breakfast['price'] }}
                            </div>
                        </div>
                    @endforeach
                    

                </div>
            </div>

            <div class="swiper-slide">
                <h1>Lunch</h1>
                <div class="contents">

                    
                    
                    @foreach ($lunchs as $index => $lunch)
                        
                        <div class="food">
                            <div class="img">
                                
                                @if ($lunch['image'] == NULL)
                                    
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQihCQgZa4NQhg2aMeP1hRGApIXvKoq6IH_AnLILn3xpA&s" alt="" srcset="">

                                @else

                                    <img src="{{ $lunch['image'] }}" alt="" srcset="">
                                @endif

                               
                            </div>
                            <div class="name">
                                {{-- @dd($breakfast['name']) --}}
                                {{ $lunch['name'] }}
                            </div>
                            <div class="price">
                                RM {{ $lunch['price'] }}
                            </div>
                        </div>
                    @endforeach
                    

                </div>
            </div>

            <div class="swiper-slide">
                <h1>Drink</h1>
                <div class="contents">

                    
                    
                    @foreach ($drinks as $index => $drink)
                        
                        <div class="food">
                            <div class="img">
                                
                                @if ($drink['image'] == NULL)
                                    
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQihCQgZa4NQhg2aMeP1hRGApIXvKoq6IH_AnLILn3xpA&s" alt="" srcset="">

                                @else

                                    <img src="{{ $drink['image'] }}" alt="" srcset="">
                                @endif

                               
                            </div>
                            <div class="name">
                                {{-- @dd($breakfast['name']) --}}
                                {{ $drink['name'] }}
                            </div>
                            <div class="price">
                                RM {{ $drink['price'] }}
                            </div>
                        </div>
                    @endforeach
                    

                </div>
            </div>
            
        </div>

        <div class="swiper-pagination"></div>
    </div>
</div>