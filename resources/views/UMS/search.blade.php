@extends('UMS.layout.main')


@section('container')
<section class="searchs container" id="hero">
    <form action="/search">
        <input type="text" name="search" id="" placeholder="Search" value="{{ request('search') }}">

        <button type="submit" class="btn"><i class="ri-search-line"></i></button>
    </form>
</section>


{{-- @dd($searchResults) --}}
@php
    $foodOptionResults = [];
    $menuResults = [];

    foreach ($searchResults as $result) {
        if ($result instanceof \App\Models\FoodOption) {
            $foodOptionResults[] = $result;
        } elseif ($result instanceof \App\Models\Menu) {
            $menuResults[] = $result;
        }
    }
@endphp

{{-- @dd($foodOptionResults) --}}
<section class="result container">
    
    @php
        $counts = count($search) + count($searchMenu);
    @endphp
    
    @if ($counts <= 0)
        <h4>No result</h4>

    @else
        <h4 class="title">Result (<span class="number">{{ $counts }}</span>)</h4>

        @if (count($search) > 0)
       
            <div class="results">
                @foreach ($search as $item)
                    
                    <div class="resultItem">
                        <div class="flex">
                            <div class="image">
                                @if (!($item->image))
                                    @php
                                        $item->image = 'https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTA1L3JtNTMzLW91dGxpbmUtMTYtbDJweTViYW0uanBn.jpg';
                                    @endphp
                                
                                @endif
                                <a href="/individual/{{ $item->id }}">
                                    <img src="{{ $item->image }}">
                                </a>
                            </div>
                            @php
                                $searchTerm = request('search');
                                $highlightedName = str_replace($searchTerm, '<span class="highlighted">' . $searchTerm . '</span>', $item->place_name);
                                $capitalizedSearchTerm = ucfirst($searchTerm);
                                $highlightedAndCapitalizedName = str_replace($capitalizedSearchTerm, '<span class="capitalized">' . $capitalizedSearchTerm . '</span>', $highlightedName);
                            @endphp
            
                            <div class="information">
                                <div class="name">
                                    <a href="/individual/{{ $item->id }}"><h5>{!! $highlightedAndCapitalizedName !!}</h5></a>                   
                                </div>

                                <div class="address">
                                    {{-- @dd($item->owner) --}}
                                    <h5><i class="ri-map-pin-line"></i>{{ $item->owner->addressLine1 }}, {{ $item->owner->addressLine2 }}, {{ $item->owner->addressLine3 }}</h5>
                                </div>
                                
                                <div class="price">
                                    <h5>RM 5.00</h5>
                                </div>
            
                                <div class="link">
                                    <a href="/individual/{{ $item->id }}">Go to place</a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper galleries">
                            @if (count($item->menu) > 0)
                            <div class="swiper-wrapper gallery">
                                
                                    @foreach ($item->menu as $menu)
                                        @php
                                            if(!($menu->image)) $menu->image = 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg'   

                                        @endphp
                                        <div class="swiper-slide image">
                                            <img src="{{ $menu->image }}" alt="" srcset="">
                                            <h4>{{ $menu->name }}</h4>
                                            <h6>RM {{ $menu->price }}</h6>
                                        </div>
                                    @endforeach
                            
                            </div>
                            
                            @endif
                            <div class="swiper-pagination"></div>
                        </div>
                        
                    </div>
                @endforeach
                
            </div>
           
        @endif

        @if (count($searchMenu) > 0)
        <div class="results">
            @foreach ($searchMenu as $item)
                @if (!($item->image))
                    @php
                        $item->image = 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg'
                    @endphp
                
                @endif
                <div class="results">
                    <div class="resultItem">
                        <div class="flex">
                            <div class="image">
                                <a href="">
                                    <img src="{{ $item->image }}" alt="" srcset="">
            
                                </a>
                            </div>
            
                            <div class="information">
                                <div class="name">
                                    <h5>{{ $item->name }}</h5>
                                </div>

                                <div class="address">

                                    <h5><i class="ri-home-2-line"></i> {{ $item->foodOption->place_name }}</h5>
                                </div>
            
                                <div class="address">                                    
                                    <h5><i class="ri-map-pin-line"></i>{{ $item->foodOption->owner->addressLine1 }}, {{ $item->foodOption->owner->addressLine2 }}, {{ $item->foodOption->owner->addressLine3 }}</h5>
                                </div>
                                
            
                                <div class="link">
                                    <a href="individual/{{ $item->foodOption->id }}/menu">Place</a>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            @endforeach
        </div>
            
        @endif

        @php
            $searchArray = [];
            $searchMenuArray = [];
            foreach ($search as $key => $value) {
                # code...
                $searchArray[] = $value;
            }

            foreach ($searchMenu as $key => $value) {
                # code...
                $searchMenuArray[] = $value;
            }
            $array_merge = array_merge($searchArray, $searchMenuArray);
            // dd($array_merge);
        @endphp

    @endif
</section>

<script>
    var swiper = new Swiper(".galleries", {
        slidesPerView: 5,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            grab: true
        }
    });
</script>
@endsection