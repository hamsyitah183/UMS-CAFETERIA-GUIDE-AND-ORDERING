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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @if(auth()->user()->role == 'owner')
        <!-- jquery -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

        <!-- slick -->
        <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <!-- Add the slick-theme.css if you want default styling -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    
        
    
    @endif

    {{-- leaflet map --}}
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
            {{-- <i class="ri-bar-chart-horizontal-line sidebar-toggle"></i>

            <div class="search-box">
                <i class="ri-search-line"></i>
                <input type="text" name="" id="" placeholder="Search here....">
            </div>

            <img src="https://images.pexels.com/photos/2071882/pexels-photo-2071882.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset=""> --}}
            @include('UMS.dashboard.partials.dashTop')
        </div>
        <div class="dash-content" id="hero">
            @yield("dash-content")
            @include('UMS.dashboard.partials.scrollUp')

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper2", {
      pagination: {
        effect: "fade",
        el: ".swiper-pagination",
        dynamicBullets: true,
        clickable: true,
      },
    });
  </script>

    <script src={{ asset('js/script.js') }}></script>
    <script>
        const scrollUp = () => {
    const scrollUp = document.getElementById('scroll-up')

    this.scrollY >= 50 ? scrollUp.classList.add('show-scroll')
                        : scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll',scrollUp)

    </script>

    <script>
        const body = document.querySelector("body"),
    modeToggle = document.querySelector(".mode-toggle");
    sidebar = body.querySelector("nav");
    sidebarToggle = document.querySelector(".sidebar-toggle");
    // logo = document.querySelector('nav .logo-name .logo_name');


let getMode = localStorage.getItem("mode");
if(getMode && getMode === "dark") {
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus === "close") {
    sidebar.classList.toggle("close");
    // logo.classList.toggle("none");
}

modeToggle.addEventListener("click", () => {
    body.classList.toggle("dark");
    if(body.classList.contains("dark")) {
        localStorage.setItem("mode", "dark");
    }
    else {
        localStorage.setItem("mode", "light");

    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close")
    if(sidebar.classList.contains("close")) {
        localStorage.setItem("status", "close");
    }
    else {
        localStorage.setItem("status", "open");

    }
})

    console.log(logo);




    </script>

<script src={{ asset('js/owner.js') }}></script>

</body>
</html>