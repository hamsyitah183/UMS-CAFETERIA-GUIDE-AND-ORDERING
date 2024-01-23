@extends('UMS.dashboard.map.OwnerMapMain')
{{-- leaflet map --}}


@section('dash-content')
<div class="overview">
                

    <h1 class="title"><i class="ri-map-pin-line"></i> Map</h1>

    <p class="head">Please put the marker where your location is</p>
    <div class="mapContent">
        <div class="left">
            <div id="map"></div>
        </div>

        <div class="right">
            
            <form action="/dashboard/map/{{ $map->id }}" id="mapForm" method=post>
                @method('put')
                @csrf
                <div class="mapCoord">
                    <label for="coordinate">Place location</label> <br>
                    <input type="text" name="coordinate" id="place_location"  disabled value="{{ old('latitude', $map->latitude) }}, {{ old('logitude', $map->longitude) }}">
                </div>

                <div class="mapCoord">
                    <label for="latitude">Latitude</label> <br>
                    <input type="text" name="latitude" id="latitude" value="{{ old('latitude', $map->latitude) }}">
                </div>
                
                <div class="mapCoord">
                    <label for="longitude">Latitude</label> <br>
                    <input type="text" name="longitude" id="longitude" value="{{ old('latitude', $map->longitude) }}">
                </div>

                <div class="mapCoord end">
                    <button type="submit" class="btn">Submit</button>
                </div>
            </form>

        </div>
    </div>

    <div class="activity">
        <ul>
            
            <li class="delete"><a href="/dashboard/map/{{ $map->id }}"><button>Cancel</button></a></li>
        </ul>
    </div>

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

    var map = L.map('map', {
        center:[latitude, longitude],
        zoom:16,
        layers: [osm]
    })

    var iconMarker = L.icon({
        iconUrl: 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiwCgugoOesGnMdtehbRycNOM0fovxM7BEMMcP-Acx1B6PJHCLNW_GlgYRhwlYDFLLhbxmWehsYY1Zxu0rNSNBMppdipZ6OtI-IdX5fraRhzMt29IM_uwXC65P2UfyZz6xZrhWR3lKRW21F_g0BtBEwBaFwvrpHH6JEwJBzSoxFtCQRueJP0j9jOb3wTFs/s1600/location-svgrepo-com.png',
        iconSize: [30,30],
        
    })

    var marker = L.marker([latitude, longitude],{
        icon:iconMarker,
        draggable:true,
    })
    .addTo(map);

    var baseMaps = {
        'Open Street Map' :osm,
        'Esri World':  Esri_WorldTopoMap,
        'Stadia Dark': Stadia_AlidadeSmooth
    }

    

    L.control.layers(baseMaps).addTo(map);

    function onMapClick(e) {
        var form = document.getElementById('mapForm');
        var coordinate = form.querySelector('#place_location');
        var latitude = form.querySelector("[name = latitude]");
        var longitude = form.querySelector("[name = longitude]");

        

        var lat = e.latlng.lat
        var lng = e.latlng.lng

        if (!marker) {
            marker = L.marker(e.latlng).addTo(map)
        } else {
            marker.setLatLng(e.latlng)
        }


        coordinate.value = lat + ", " + lng
        latitude.value = lat
        longitude.value = lng
    }

    map.on('click',onMapClick )

</script>

@endsection