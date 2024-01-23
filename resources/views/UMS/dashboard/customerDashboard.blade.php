@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<div class="overview">
    <div class="title">
        <i class="ri-timer-2-line"></i>
        <span class="text">Dashboard</span>
    </div>

    <!-- search box and title -->
    

    <!-- content -->
    <div class="content">
        
        {{-- @dd($post) --}}
        <!-- news from the food option -->
        <div class="content1">
            <div class="">
                <div class="news">
                    <div class="img">
                        @php
                        // dd($cart->menu->image);
                            $imageUrl = $post->image
                                ? (Str::startsWith($post->image, ['http://', 'https://'])
                                    ? $post->image
                                    : asset('storage/' . $post->image))
                                : 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg'
                        @endphp
                        <img src="{{ $imageUrl }}" alt="" srcset="">
                    </div>

                    <div class="word">
                        <h1>Hello {{ auth()->user()->name }}</h1>

                        @php
                            $newsTitle = [
                                $post->foodOption->place_name . ' has a <span class="highlight">Good news</span>',
                                '<span class="highlight">Great news</span> coming your way from '. $post->foodOption->place_name,
                                "Here's some <span class='highlight'>fantastic news</span> from " . $post->foodOption->place_name,
                                $post->foodOption->place_name . ' has some <span class="highlight">uplifting news</span> to share!'
                            ];

                            shuffle($newsTitle);
                        @endphp

                        <div class="newsTitle">{!! $newsTitle[0] !!}</div>



                        <p class="newsHeadline">{{ $post->title }}</p>
                        <button class="btn"><a href="">Check news</a></button>
                    </div>
                </div>

                @include('UMS.dashboard.customer.CustomerDashboardTopPlace')
                
            </div>

            @include('UMS.dashboard.customer.CustomerDashboardCart')
        </div>

        @include('UMS.dashboard.customer.CustomerDashboardOrder')
        
    </div>

    
    
</div>

@endsection