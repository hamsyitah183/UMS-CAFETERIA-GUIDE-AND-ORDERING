<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    {{-- <link rel="stylesheet" href="wajib.css"> --}}
    <!-- <link rel="stylesheet" href="individual.css"> -->
    @for ($i = 0; $i < count($style); $i++)
        <link rel="stylesheet" href={{ asset('css/'.$style[$i].'.css')}}>
    @endfor
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    {{-- <link rel="stylesheet" href="mapVenue.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery.min.css" integrity="sha512-8CD2yLDF1AmNik2UdGxxZLkJ5QlmCqER75U2O3r1vOyobV9QVeXaFblFkTDUnZfoOxwwJp3PdI+gp9s0GYYLDA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js" integrity="sha512-jEJ0OA9fwz5wUn6rVfGhAXiiCSGrjYCwtQRUwI/wRGEuWRZxrnxoeDoNc+Pnhx8qwKVHs2BRQrVR9RE6T4UHBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery-bundle.min.css" integrity="sha512-nUqPe0+ak577sKSMThGcKJauRI7ENhKC2FQAOOmdyCYSrUh0GnwLsZNYqwilpMmplN+3nO3zso8CWUgu33BDag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

        <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    

</head>
<body>

    @include('UMS.partials.navBar')

    @yield('container')



    <div class="container">
        <a href="#hero" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line"></i>
        </a>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src={{ asset('js/mapVenue.js') }}></script>


   <script src={{ asset('js/main.js') }}></script>

</body>