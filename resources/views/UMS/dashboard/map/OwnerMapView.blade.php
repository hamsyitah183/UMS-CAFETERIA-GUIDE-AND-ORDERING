@extends('UMS.dashboard.map.OwnerMapMain')
{{-- leaflet map --}}


@section('dash-content')

{{-- ada sudah map --}}
<div class="overview">
                

    <h1 class="title"><i class="ri-map-pin-line"></i> Map</h1>


    @if ($map)

    <div class="mapContent">
        <div class="left">
            <div id="map"></div>
        </div>

        <div class="right">
            
            <div class="mapCoord">
                <label for="coordinate">Place location</label> <br>
                <input type="text" name="coordinate" id="place_location" value = '{{ $map->latitude }}, {{ $map->longitude }}'disabled>
            </div>

            <div class="mapCoord">
                <label for="latitude">Latitude</label> <br>
                <input type="text" name="latitude" id="latitude" value = '{{ $map->latitude }}' disabled>
            </div>
            
            <div class="mapCoord">
                <label for="longitude">Latitude</label> <br>
                <input type="text" name="logitude" id="longitude" value = '{{ $map->longitude }}' disabled>
            </div>

        </div>
    </div>

    <div class="activity">
        <ul>
            <li class="edit"><a href="/dashboard/map/{{ $map->id }}/edit"><button>Edit</button></a></li>
            <li class="delete"><a href=""><button>Delete</button></a></li>
        </ul>
    </div>

    @else
    please fill in your map

    @php
        if($map->latitude == NULL) {
            $map->latitude = 0;
            $map->longitude = 0;
        }
    @endphp
   
    @endif



    <div class="container">
        <a href="#hero" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line"></i>
        </a>
     </div>
</div>

<script>
    var latitude = @json($map->latitude);
    var longitude = @json($map->longitude);

    var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });

    var Stadia_AlidadeSmooth = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.{ext}', {
    minZoom: 0,
    maxZoom: 20,
    attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    ext: 'png'
    });

    var Esri_WorldTopoMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community'
    });

// var map = L.map('map').setView([5.670106, 116.363931], 17);
    var iconMarker = L.icon({
            iconUrl: 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiwCgugoOesGnMdtehbRycNOM0fovxM7BEMMcP-Acx1B6PJHCLNW_GlgYRhwlYDFLLhbxmWehsYY1Zxu0rNSNBMppdipZ6OtI-IdX5fraRhzMt29IM_uwXC65P2UfyZz6xZrhWR3lKRW21F_g0BtBEwBaFwvrpHH6JEwJBzSoxFtCQRueJP0j9jOb3wTFs/s1600/location-svgrepo-com.png',
            iconSize: [30,30],
            
    })
    var map = L.map('map', {
    center:[latitude, longitude],
    zoom:12,
    layers: [osm]
    });

    var marker = L.marker([latitude, longitude],{
            icon:iconMarker,
            draggable:true,
    })
    .addTo(map);



</script>
@endsection