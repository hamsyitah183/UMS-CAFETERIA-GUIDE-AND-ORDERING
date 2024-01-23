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


    <!-- search section -->
    <section class="search__section" id="search">
        <div class="search__container container">
            <h2 class="medium__title">
                <span class="highlight">Search</span> for food and place!
            </h2>

            <form action="/search">
                <div class="search-box">
                    <input type="text" name="search" id="" placeholder="FKJ or Nasi" class="search__textbox">
                
                    <button type="submit">
                        <div class="search-logo btn">
                            <i class="ri-search-line"></i>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </section>

    <section class="dining__option" id="dining">
        <div class="dining__container container">
            <h2 class="big__title"><span class="highlight">Food option</span></h2>

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

                <div class="dinings market">
                    <a href="/cafeteria.html">
                        <img src="https://www.ums.edu.my/v5/images/stories/berita_attach/tam.JPG" alt="" srcset="">
                        <p class="paragraph">Market</p>
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
    <section class="gallery" id="gallery">
        <div class="gallery__container container">
            <h1 class="big__title highlight">Gallery</h1>

            <div class="gallery_img">
                <img src="https://images.pexels.com/photos/827528/pexels-photo-827528.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="images">
                <img src="https://images.pexels.com/photos/4393021/pexels-photo-4393021.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="images">
                <img src="https://images.pexels.com/photos/840216/pexels-photo-840216.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="images">
                <img src="https://images.pexels.com/photos/6238052/pexels-photo-6238052.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="images">
                <img src="https://images.pexels.com/photos/867452/pexels-photo-867452.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="images">
                <img src="https://images.pexels.com/photos/1785852/pexels-photo-1785852.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="images">
                <img src="https://www.myboost.com.my/wp-content/uploads/2022/04/WhatsApp-Image-2022-03-24-at-10.34.01-AM-1-1024x768.jpeg" alt="" srcset="">
                <img src="https://assets.nst.com.my/images/articles/SETMEAL13_1657706600.jpg" alt="" srcset="">
                <img src="https://selangorkini.my/wp-content/uploads/2019/04/PSX_20190409_151225.jpg" alt="" srcset="">
                <img src="https://pbs.twimg.com/media/FWAdC0baAAAKvIv.jpg:large" alt="" srcset="">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6ojJhsamWAKTH5tviZGhWSEMPxHrk9gMfDA&usqp=CAU" alt="" srcset="">
            </div>
        </div>
    </section>



    <!-- feedback -->
    <section class="feedback__section" id="feedback">
        <div class="feedback__container container">
            <h3 class="small__title">feedback</h3>
            <h1 class="big__title">What Our Consumers Say</h1>

            <div class="feedback">
                <div class="feedbacks">
                    <div class="logo">
                        <i class="ri-double-quotes-r"></i>
                    </div>

                    <div class="paragraph feedback-customer">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, nostrum.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos vitae dolores 
                        eveniet quidem ex? Velit cupiditate nam dolores eveniet labore tempore rerum 
                        adipisci placeat nemo hic ab veniam 
                        sint illum repudiandae eligendi molestiae qui, porro rem accusamus maxime quod animi!
                    </div>

                    <p class="credit paragraph">
                        John Doe
                    </p>
                </div>

                <div class="feedbacks">
                    <div class="logo">
                        <i class="ri-double-quotes-r"></i>
                    </div>

                    <div class="paragraph feedback-customer">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, nostrum.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos vitae dolores 
                        eveniet quidem ex? Velit cupiditate nam dolores eveniet labore tempore rerum 
                        adipisci placeat nemo hic ab veniam 
                        sint illum repudiandae eligendi molestiae qui, porro rem accusamus maxime quod animi!
                    </div>

                    <p class="credit paragraph">
                        John Doe
                    </p>
                </div>

                <div class="feedbacks">
                    <div class="logo">
                        <i class="ri-double-quotes-r"></i>
                    </div>

                    <div class="paragraph feedback-customer">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas, nostrum.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos vitae dolores 
                        eveniet quidem ex? Velit cupiditate nam dolores eveniet labore tempore rerum 
                        adipisci placeat nemo hic ab veniam 
                        sint illum repudiandae eligendi molestiae qui, porro rem accusamus maxime quod animi!
                    </div>

                    <p class="credit paragraph">
                        John Doe
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection