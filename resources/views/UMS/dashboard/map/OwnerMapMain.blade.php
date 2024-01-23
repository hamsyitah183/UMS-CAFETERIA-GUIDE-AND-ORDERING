<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard Panel</title>

    <!-- css -->
    @for ($i = 0; $i < count($style); $i++)
        <link rel="stylesheet" href={{ asset('css/'.$style[$i].'.css')}}>
    @endfor

    <!-- iconscout css -->
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
    @include('UMS.dashboard.partials.nav')

    <section class="dashboard">
        {{-- @include('partials.nav') --}}
        <div class="top">
            <i class="ri-bar-chart-horizontal-line sidebar-toggle"></i>

            <div class="search-box">
                <i class="ri-search-line"></i>
                <input type="text" name="" id="" placeholder="Search here....">
            </div>

            <img src="https://images.pexels.com/photos/2071882/pexels-photo-2071882.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
        </div>
        <div class="dash-content" id="hero">
            @yield("dash-content")
            @include('UMS.dashboard.partials.scrollUp')

        </div>
    </section>

    <script src={{ asset('js/ownerMap.js') }}></script>

    <script src={{ asset('js/owner.js') }}></script>
    
</body>
</html>