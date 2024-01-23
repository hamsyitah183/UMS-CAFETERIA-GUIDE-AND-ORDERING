<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $type }}</title>
     <!--=============== FAVICON ===============-->
     <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

     <!--=============== REMIXICONS ===============-->
     <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

     <!--=============== SWIPER CSS ===============-->
     <link rel="stylesheet" href="">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <!--=============== CSS ===============-->
     @for ($i = 0; $i < count($style); $i++)
        <link rel="stylesheet" href={{ asset('css/'.$style[$i].'.css')}}>
     @endfor

</head>
<body>

    @include('UMS.partials.navBar')
    
    @yield('container')

    
    <div class="container">
      <a href="#hero" class="scrollup" id="scroll-up">
          <i class="ri-arrow-up-line"></i>
      </a>
   </div>

 
    <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        loop: "true",
      },
      loop: "true",
    });
  </script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

   <script src={{ asset('js/main.js') }}></script>

   <script>
    const scrollUp = () => {
        const scrollUp = document.getElementById('scroll-up')

        this.scrollY >= 50 ? scrollUp.classList.add('show-scroll')
                            : scrollUp.classList.remove('show-scroll')
    }
    window.addEventListener('scroll',scrollUp)
   </script>

   @yield('menuSwiper')
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>