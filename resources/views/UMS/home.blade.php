
@extends('UMS.layout.main')


@section('container')
    <!-- Announcement section -->

    <section class="announcement__section swiper mySwiper" id="announcement">
        <div class="announcement__container swiper-wrapper" id="announcement-container">
            
            @foreach ($announcement as $a)
                <div class="announcement swiper-slide">
                    <div class="announcement__background ">
                        <img src="{{ $a->image }}" alt="">
                    </div>
        
                    <div class="announcement__title">
                        <h2><a href="/UMS/Announcement/{{ $a->slug }}">{{ $a->title }}</a></h2>
                        
                    </div>
                </div>
            @endforeach
                
                <div class="announcement swiper-slide">
                    <div class="announcement__background ">
                        <img src="https://www.theborneopost.com/newsimages/2022/07/ums-food.jpg" alt="">
                    </div>
        
                    <div class="announcement__title">
                        <h2>Hello</h2>
                        
                    </div>
                </div>
                
                
            
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>

    <!-- about us section -->
    <section class="about__section" id="about">
       <div class="about__container container">
            <div class="about__img">
                <img src="https://images.pexels.com/photos/4393021/pexels-photo-4393021.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
            </div>

            <div class="about__caption">
                <h3 class="small__title">
                    About us
                </h3>

                <h2 class="medium__title">
                    UMS Cafeteria <span class="highlight">guide</span> <br>and <span class="highlight">ordering</span> system
                </h2>

                <p class="paragraph">
                    Lorem, ipsum dolor sit amet consectetur 
                    adipisicing elit. Odio exercitationem hic incidunt.
                </p>

                <button class="btn">
                    Read more
                </button>
                
        </div>
       </div>
    </section>


    

    <section class="dining__option" id="dining">
        <div class="dining__container container">
            <h2 class="big__title"><span class="highlight">Food places</span></h2>

            <div class="dining">
                <div class="dinings cafeteria">
                    <a href="/cafeteria.html">
                        <img src="https://images.pexels.com/photos/2067638/pexels-photo-2067638.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
                        <p class="paragraph">Cafeteria</p>
                    </a>
                </div>

                <div class="dinings kiosk">
                    <a href="/cafeteria.html">
                        <img src="https://static.wixstatic.com/media/beaaa8_b6c286b4e81c4e2da5e97218b1cb8009~mv2.jpg/v1/fill/w_740,h_493,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/beaaa8_b6c286b4e81c4e2da5e97218b1cb8009~mv2.jpg" alt="" srcset="">
                        <p class="paragraph">Kiosk</p>
                    </a>
                </div>

               

                <div class="dinings vendor">
                    <a href="/cafeteria.html">
                        <img src="https://bloximages.chicago2.vip.townnews.com/theeagle.com/content/tncms/assets/v3/editorial/6/2c/62c395ea-6e95-11e5-aa75-07e781912c59/55a89333954d2.image.jpg?resize=1200%2C793" alt="" srcset="">
                        <p class="paragraph">Food vendor</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- gallery -->
    <section class="gallery">
        <div class="gallery__container container">
            <div class="small__title">Gallery</div>
            <h1 class="big__title">Explore visual of our food places</h1>
            {{-- @dd($gallery) --}}

            <div class="gallery_img"  id="gallery">
                @foreach ($gallery as $item)
                @php
                $imageUrl = $item->image
                    ? (Str::startsWith($item->image, ['http://', 'https://'])
                        ? $item->image
                        : asset('storage/' . $item->image))
                    : asset('path/to/placeholder-image.jpg');
                 @endphp
                     <a href="{{ $imageUrl }}">
                        <img src="{{ $imageUrl }}" alt="" srcset="" class="image">
                    </a>
                @endforeach
            </div>
        </div>
        <script type="text/javascript">
            lightGallery(document.getElementById('gallery'), {
                
            });
        </script>
    </section>



    <!-- feedback -->
    <section class="feedback__section" id="feedback">
        {{-- @dd($feedback) --}}
        <div class="feedback__container container">
            <h3 class="small__title">feedback</h3>
            <h1 class="big__title">What Our Consumers Say</h1>

            <div class="feedback">
                @foreach ($feedback as $item)
                    {{-- @dd($item->foodOption) --}}
                    <div class="feedbacks">
                        <div class="logo">
                            <div class="rating"><span class="highlight">{{ $item->rate }}</span> / 5</div>
                            <!-- <i class="ri-double-quotes-r"></i> -->
                        </div>

                        <div class="paragraph feedback-customer">
                            {{ $item->message }}
                        </div>

                        <p class="credit paragraph">
                            {{ $item->name }} on <a href="/individual/{{ $item->place_id }}" class="link"><span class="link">{{ $item->foodOption->place_name }} <i class="ri-external-link-line"></i></span></a>
                        </p>
                    </div>
                @endforeach

                

            </div>
        </div>
    </section>
@endsection