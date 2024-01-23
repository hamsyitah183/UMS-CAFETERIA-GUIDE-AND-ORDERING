@extends('UMS.layout.mapMain')

@section('container')
<section class="hero">
    <img src="https://www.ums.edu.my/v5/images/2021/Joe_PPSKK-_copy.jpg" alt="" srcset="">
    <div class="hero_word container">
        <div class="small__title">Map venue</div>
        <h1 class="medium__title">
            <span class="highlight">Explore</span> and order campus 
            <br>delights <span class="highlight">Effortlessly</span> with our interactive map</h1>
    <!-- <p class="medium__title"></p> -->
    </div>
    
</section>

@php
    
    // dd($cafeteriaLongitude);
    // dd($cafeteriaLatitude);
    
    

@endphp

<section class="main">
    <div class="left">
        <div class="cafeterias place">
            <div class="cafeteria title" id="cafeteria">
                Cafeteria
            </div>
            <ul class="cafeteria_list list" id="cafeteria_list">

                @foreach ($cafeteria as $cafeteria)

                    
                
                    <li class="{{ $cafeteria->place_slug }}">{{ $cafeteria->place_name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="kiosks place">
            <div class="kiosk title" id="kiosk">
                Kiosk
            </div>
            <ul class="kiosk_list list" id="kiosk_list">
                @foreach ($kiosks as $kiosk)

                    <li class="{{ $kiosk->place_slug }}">{{ $kiosk->place_name }} </li>
                    
                @endforeach
            </ul>
        </div>

        <div class="vendors place">
            <div class="vendor title" id="vendor">
                Vendor
            </div>
            <ul class="vendor_list list" id="vendor_list">
                @foreach ($vendors as $vendor)
                    <li class="{{ $vendor->place_slug }}">{{ $vendor->place_name }}</li>
                  
                @endforeach
           
            </ul>
        </div>
    </div>

    

    <div id="test"></div>

    <div class="middle">
        <div id="map"></div>
    </div>

  

    
</section>
@endsection