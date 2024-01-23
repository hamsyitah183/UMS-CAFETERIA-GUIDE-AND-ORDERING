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
    $mapNames = [];
    $mapSlug = [];
    $placeId = [];
    $placeImage = [];
    
    foreach ($map as $item) {
        $mapNames[] = $item->foodOption->place_name;
    }

    foreach ($map as $item) {
        $mapSlug[] = $item->foodOption->place_slug;
        $placeId[] = $item->foodOption->id;
        
        if(!$item->foodOption->image) {
            $placeImage[] = 'https://www.creativefabrica.com/wp-content/uploads/2018/10/Chef-restaurant-logo-by-DEEMKA-STUDIO-4.jpg';
        }
        else {
            $placeImage[] = $item->foodOption->image;
        }
    }

    $latitude = $map->pluck('latitude');
    $longitude = $map->pluck('longitude');

    
    
    

@endphp

<section class="main">
    <div class="left">
        <div class="cafeterias place">
            <div class="cafeteria title" id="cafeteria">
                Places
            </div>
            <ul class="cafeteria_list list" id="cafeteria_list">

                @foreach ($map as $mapItem)


                <li class="{{ $mapItem->foodOption->place_slug }}">{{ $mapItem->foodOption->place_name }}</li>
                    
                
                {{-- {{ $mapItem->foodOption->place_slug }} --}}
                @endforeach
            </ul>
        </div>

    </div>

    

    <div id="test"></div>

    <div class="middle">
        <div id="map"></div>
    </div>

  
    <script>
        var mapData = @json($map);
var placeNames = @json($mapNames);
var placeSlugs = @json($mapSlug);
var indiviualId = @json($placeId);
var placeImage = @json($placeImage);

var placeIds = placeSlugs;

var latitudes = @json($latitude);
var longitudes = @json($longitude);

var coordinates = [];

for (var i = 0; i < latitudes.length; i++) {
    coordinates.push([latitudes[i], longitudes[i]]);
}

var test = document.getElementById('test');
// test.innerHTML = placeSlugs[0];

// Map
var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});

var cafeMarker = L.icon({
    iconUrl: 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgUgJifSHoefqV0WFUTR8M_qhe8HDVrP4dJqXrQxH5E71tP2Hdy5IF8TKNcS4wWRaIDb787tyr1B8tIr77TjF0fYptRkxzCvT02PVZTjS6i-VnutEYHtxuuEPeuoAsRxDb24vohniNwbie8RcCZfL3tIc5aWs_GlXjXP6ytgJhHGDCiFeiXn7nHRRezaTg/s1600/cafeLocation.png',
    iconSize: [35, 35],
});

var map = L.map('map', {
    center: [6.034549, 116.120253],
    zoom: 16,
    layers: [osm]
});

for (var j = 0; j < coordinates.length; j++) {
    placeIds[j] = document.querySelector('.' + placeSlugs[j]);

    var pop = L.popup({
        closedOnClick: true
    }).setContent('<h2 class = "head"><a href="individual/' + indiviualId[j] + '">' 
        + placeNames[j] + '</a></h2>' + 
        '<br>' + '<img class="profile" src=' + placeImage[j] + '>'
    );

    var tooltipContent = placeNames[j];
    var marker = L.marker(coordinates[j], { icon: cafeMarker })
        .bindPopup(pop)
        .bindTooltip(tooltipContent, { permanent: true, direction: 'top' })
        .addTo(map);

    // Add click event for each marker
    marker.on('click', function (event) {
        var clickedMarker = event.target;
        map.flyTo(clickedMarker.getLatLng(), 19);
    });

    // add click event for the selection
    function createEvent(index) {
        placeIds[index].addEventListener('click', () => {
            map.flyTo(coordinates[index], 19);
        });
    }

    createEvent(j);
}


    </script>
    
</section>
@endsection