@extends('UMS/layout/main')
{{-- @dd($announcements->admin) --}}
@section('container')

<section class="hero" id="hero">
    <div class="hero__container container">
        <h2 class="small__title">About us</h2>
        <h1 class="big__title">
            <span class="highlight">Delving</span> into Our Story
        </h1>
    </div>
   </section>

   <section class="about" id="about">
    <div class="about__container container">
        <div class="img">
            <img src="https://www.fumi-fuiw.org/fuiw/sites/default/files/styles/member_image/public/services/UMS-Universiti-Malaysia-Sabah-.jpg.600x400_q85.jpg?itok=aM_meWR-" alt="" srcset="">

        </div>

        <div class="text">
            <h3 class="small__title">About us</h3>
            <h2 class="medium__title">Our campus food story</h2>
            <p class="paragraph">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint, id.</p>
        </div>
    </div>
   </section>

   <div class="offers" id="offer">
        <div class="text container">
            <h3 class="small__title">offer</h3>
            <h2 class="medium__title">What we offer ?</h2>
        </div>
        <div class="content container">
            <div class="offer ">
                <div class="img">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiknLg5sTBUlv7M24vNk9Y1jqqreSBzbR-ZU-rygV2kdbKIlknqLU-pgRGz0f2MaRgNsNuCG_4TMKDVSArPVYzhX_a8y6skLAnARXx_PvxpazWHs1PnY9MZArHa37Szhq8Xn6iaNwIeFGGT25ApOExSvIQR5QAYn6_v-1kNHAAuMZCt1rp7jfQvVRAsXdE/s1600/undraw_Steps_re_odoy.png" alt="" srcset="">
                </div>
                <h1 >Guide</h1>
            </div>
            <div class="offer ">
                <div class="img">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhwhuBhVQBpJrBqJudFMiSazDaiUIdDL-W0dH4nvSIgCrO1RRN8pYyA1i2p_yMjMrPBxnGKKZSbETo0cFOb-Qd5oWOLbIYqn2ra2hol8US3KYuHxTVi-u0Lg8q1WR77Mfj_GfpxyJN7JdoDCvaNz3xYj7RXOLiGDNngG0_MY7ZLtvBF39Khm-tEMCWE_mI/s1600/undraw_Add_to_cart_re_wrdo.png" alt="" srcset="">
                </div>
                <h1 >Ordering</h1>
            </div>
        </div>
   </div>

   <section class="number" id="number">

    <div class="number__container container">
        <div class="text">
            <h1 class="small__title">join us</h1>
            <h1 class="medium__title">Beyond the Plate: Mapping the Campus Culinary Universe - By the Numbers</h1>
        </div>
        <div class="numbers">
            <div class="left">
                <div class="content">
                    {{-- @dd($foodPlace->where('type', 1)->count()) --}}
                    <span class="num" data-val="{{ $foodPlace->where('type', 1)->count() }}">00</span>
                    <span class="title">Cafeteria</span>
                </div>
    
                <div class="content">
                    <span class="num" data-val="{{ $foodPlace->where('type', 2)->count() }}">00</span>
                    <span class="title">Kiosk</span>
                </div>
    
                <div class="content">
                    <span class="num" data-val="{{ $foodPlace->where('type', 3)->count() }}">00</span>
                    <span class="title">Vendor</span>
                </div>
    
                <div class="content">
                    <span class="num" data-val="{{ $user->count() }}">00</span>
                    <span class="title">User</span>
                </div>
            </div>
    
            <div class="right">
                <img src="https://images.pexels.com/photos/11912788/pexels-photo-11912788.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
            </div>
        </div>
    </div>
    <script>
        const valueDisplays = document.querySelectorAll('.num');
        const sectionNumber = document.getElementById('number');
    
        let animationTriggered = false;
    
        const checkIfInView = () => {
            const rect = sectionNumber.getBoundingClientRect();
            const isVisible = rect.top < window.innerHeight && rect.bottom >= 0;
    
            if (isVisible && !animationTriggered) {
                startCountingAnimation();
                animationTriggered = true;
            }
        };
    
        const startCountingAnimation = () => {
            valueDisplays.forEach(valueDisplay => {
                let startValue = 0;
                let endValue = parseInt(valueDisplay.getAttribute('data-val'));
                let duration = Math.floor(4000 / endValue);
                let counter = setInterval(function() {
                    startValue += 1;
                    valueDisplay.textContent = startValue;
                    if (startValue == endValue) {
                        clearInterval(counter);
                    }
                }, duration);
            });
        };
    
        // Initial check on page load
        checkIfInView();
    
        // Check if the section is in view on scroll
        window.addEventListener('scroll', checkIfInView);
        </script>
   </section>

   



@endsection