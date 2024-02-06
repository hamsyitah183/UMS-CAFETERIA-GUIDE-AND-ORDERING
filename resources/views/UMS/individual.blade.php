@extends('UMS.layout.main')

@section('container')
    <!-- hero -->
    {{-- @dd($foodOption->reviewAndRating->pick(4)); --}}
    <section class="hero" id="hero">
        @php
            $imageUrl = $foodOption->image
                ? (Str::startsWith($foodOption->image, ['http://', 'https://'])
                    ? $foodOption->image
                    : asset('storage/' . $foodOption->image))
                : asset('path/to/placeholder-image.jpg');
        @endphp
        <img src="{{ $imageUrl }}" alt="" srcset="">
        <div class="hero__container container">
            
            <div class="inside">
                <h1 class="big__title">{{ $foodOption->place_name }}</h1>

                <ul>
                    {{-- <li><a href="{{ route('menu', ['foodOption' => $foodOption->id, 'menu' => 'menu']) }}">Menu</a></li>                     --}}
                    <li><a href="/individual/{{ $foodOption->id }}/menu">Menu</a></li>
                    <li><a href="/individual/{{ $foodOption->id }}/map">Map</a></li>
                    @if ($foodOption->order == 1)
                        <li><a href="/individual/{{ $foodOption->id }}/order">Order</a></li>
                    
                    @else 
                        <li>No Order</li>
                    @endif
                    
                </ul>
            </div>
        </div>
    </section>

    <!-- promo post -->
    <section class="promo" id="promo">
        {{-- @dd($foodOption->post->where('Category', 'Promo')->first()) --}}
        <div class="promo__container container">
            <h1>Our post</h1> <p><a href=""><i class="ri-timeline-view"></i> View all</a></p>

            <div class="posts">
                @if (count($foodOption->post) > 0)
                    <div class="post">
                        <div class="img">
                            <a href="/individual/{{ $foodOption->id }}/post/{{ $foodOption->post[0]->id }}">
                                <img src="{{ $foodOption->post[0]->image }}" alt="">
                            </a>
                        </div>
                        <div class="infos">
                            <p class="title">{{ $foodOption->post[0]->title }}</p>
                            <p class="category">{{ $foodOption->post[0]->category }}</p>
                        </div>
                    </div>
                @else
                    <p>No posts available</p>
                @endif
            </div>
        </div>
    </section>

    <!-- info -->
    <section class="info" id="info">
        <div class="info__container container">
            <div class="tab-nav-bar">
                <ul>
                    <li class="tab-btn active"><p class="lead">About</p></li>
                    <li class="tab-btn"><p class="lead">Open Time</p></li>
                </ul>
            </div>
    
            <!-- content -->
            <div class="tab-content">
                <div class="tab active about">
                    <p>{{ $foodOption->description }}</p>
                </div>
    
                <div class="tab time">
                    
                    <table>
                        @if (count($foodOption->openingHour)> 0)
                            @foreach ($foodOption->openingHour as $day)
                                <tr>
                                    <td class="day">{{ $day->dayOfTheWeek }}</td>
                                    <td class="time">

                                        @if ($day->openTime != NULL || $day->closeTime != NULL)
                                            {{ $day->openTime }} AM until {{ $day->closeTime }} PM
                                        @else
                                            Closed
                                        @endif
                            
                                    </td>
                                </tr>
        
                            @endforeach
                        @else
                            <tr>
                                <td class="day">None</td>
                                <td class="time">None</td>
                            </tr>
                        @endif
                       
                        
                        
                        
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- gallery -->
    
    <section class="gallery container" id="gallery">
        <div class="gallery__container container swiper">
            <div class="gallery__title">
                <h3 class="small__title">gallery</h3>
                <h2 class="medium__title"><span class="highlight">Captured Moments:</span> Our Gallery</h2>
                <p class="seeMore"><a href="/individual/{{ $foodOption->id }}/gallery"><i class="bi bi-camera"></i> See all ({{ count($foodOption->gallery) }})</a></p>
            </div>
            <div class="swiper-wrapper list-gallery">
                
                @if (count($foodOption->gallery)> 0)
                    @foreach ($foodOption->gallery as $item)
                        <div class="images swiper-slide">
                            @if ($item->image)
                                @if (Str::startsWith($item->image, ['http://', 'https://']))
                                    <!-- External image from the internet -->
                                    <img src="{{ $item->image }}" alt="" class="image">
                                @else
                                    <!-- Image from Laravel public storage -->
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="" class="image">
                                @endif
                            @else
                                <!-- Display a placeholder or default image when no image is available -->
                                <img src="{{ asset('path/to/placeholder-image.jpg') }}" alt="" class="image">
                            @endif
                        </div>
                    @endforeach

                
                    
                @else
                    

                @endif
                
                

                
                
            </div>

            <div>
                <div class="swiper-button-next button ">
                    <i class="ri-arrow-right-line"></i>
                </div>
                <div class="swiper-button-prev button">
                    <i class="ri-arrow-left-line"></i>
                </div>
            </div>
        </div>
    </section>


    <!-- top sales -->
    <section class="top_sales" id="top_sales">
        <div class="top__container container">
            <h3 class="small__title">top sales</h3>
            <h2 class="medium__title">Campus Cravings: Our Most-Loved <br><span class="highlight">Dining Picks</span></h2>
        
            <div class="food__container">
                <div class="foods">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Local_Street_Style_%284857314400%29.jpg" alt="" srcset="">
                    <p>Nasi goreng</p>
                    <p class="small__title">rm 5.00</p>
                </div>

                <div class="foods">
                    <img src="https://resepichenom.com/media/Kari_Ayam_Bangladesh.jpg" alt="" srcset="">
                    <p>Nasi goreng</p>
                    <p class="small__title">rm 5.00</p>
                </div>

                <div class="foods">
                    <img src="https://scontent.fkul5-3.fna.fbcdn.net/v/t1.6435-9/105985383_106469961123193_3819877987364252135_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=dd63ad&_nc_ohc=SYnLMH91JrQAX_JNNYP&_nc_ht=scontent.fkul5-3.fna&oh=00_AfCYB-ye-oogiKXGr6sgdZtvAcsUZXU9WkfWxLjWjr_Gug&oe=6570FE96" alt="" srcset="">
                    <p>Nasi goreng</p>
                    <p class="small__title">rm 5.00</p>
                </div>

                <div class="foods">
                    <img src="https://scontent.fkul5-2.fna.fbcdn.net/v/t1.6435-9/44953618_508985936178612_2290021071249735680_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=c2f564&_nc_ohc=iFGcPxIPKAIAX8zb0Kb&_nc_ht=scontent.fkul5-2.fna&oh=00_AfBgdMQH4WseCRuj9KxB7LxdgIrpYiXW5aGN60cNds4ehQ&oe=65711291" alt="" srcset="">
                    <p>Nasi goreng</p>
                    <p class="small__title">rm 5.00</p>
                </div>
            </div>
        </div>
    </section>

    <!-- payment -->
    <section class="payment">
        {{-- @dd($foodOption->payment) --}}
        <div class="payment__container container">
            <h2 class="medium__title"><span class="highlight">Payment method</span></h2>
            @if (count($foodOption->payment)> 0)
            <div class="method">
                @foreach ($foodOption->payment as $item)

                <?php
                    $i = 'ri-question-mark-line'; // Default icon, in case paymentType is not recognized

                    switch ($item->paymentType) {
                        case 'E-wallet':
                            $i = 'ri-wallet-line';
                            break;
                        case 'Cash':
                            $i = 'ri-cash-line';
                            break;
                        case 'Transfer':
                            $i = 'ri-exchange-dollar-line';
                            break;
                        // Add more cases as needed
                    }
                ?>


                    <div class="methods">
                        <span class="logos">
                            <i class={{ $i  }}></i>
                        </span>
                        <div class="detail">
                            <p>{{ $item->paymentType }}</p>
                            <p class="description">{{ $item->description }}</p>
                        </div>
                    </div>
                @endforeach
                

            </div>

            @else 
            <div class="method">
                <div class="methods">
                    
                    <div class="detail">
                        No detail yet
                    </div>
                    
                </div>

                

            </div>
            @endif

            
        </div>
    </section>

     <!-- review and rating -->
     <section class="review">
        @php
            $averages = [];
            foreach ($foodOption->reviewAndRating as $review) {
                $averages[] = $review->rate;
            }
        
            $average = count($averages) > 0 ? number_format(array_sum($averages) / count($averages), 1) : 0;
        @endphp
        <div class="review__container container">
            <h3 class="small__title">Review and Rating</h3>
            <h2 class="medium__title">Campus Cravings: User-Tested <br><span class="highlight">Favorites </span></h2>
        
            <div class="reviews">
                <div class="summary">
                    <div class="number">
                        <h1><span class="highlight">{{ $average }}</span> / 5</h1>
                    </div>
                    <div class="desc">
                        <p>Customer rating ({{ $foodOption->reviewAndRating->count() }})</p> 
                        <a href="/individual/{{ $foodOption->id }}/rating">See all</a>
                    </div>
                </div>

                <div class="contents">
                    @foreach ($foodOption->reviewAndRating->take(3) as $review)
                    <div class="item">
                        <div class="top">
                            <div class="img">
                                @if ($review->user && $review->user->username)
                                @php
                                    $imageUrl = $review->user->image
                                        ? (Str::startsWith($review->user->image, ['http://', 'https://'])
                                            ?$review->user->image
                                            : asset('storage/' . $review->user->image))
                                        : 'https://upload.wikimedia.org/wikipedia/commons/b/bc/Unknown_person.jpg';
                                @endphp
                                <img src="{{ $imageUrl }}" alt="" srcset="">
                                @else
                    
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/bc/Unknown_person.jpg" alt="" srcset="">
                                @endif
                            </div>
                            <div class="top_content">
                                <div class="name">
                                    @if ($review->user && $review->user->username)
                                    <span class="customerName">{{ $review->user->username }}</span>
                                    @else
                        
                                        <span class="customerName">Guest</span>
                                    @endif
                                    
                                    <span class="rating">{{ $review->rate }} / 5</span>
                                </div>
                                <div class="time">
                                    <h5>{{ $review->created_at->format('j M y, g:i a') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="bottom">
                            {{ $review->message }}
                        </div>

                        <div class="line"></div>
                    </div>
                    @endforeach

                    
                </div>
            </div>

            <button class="btn" style="margin-top: 30px"><a href="/individual/{{ $foodOption->id }}/rating">Add your review</a></button>
        </div>
    </section>


    <!-- contact us -->
    <section class="contact">
        <div class="contact__container container">
            <h3 class="small__title">contact us</h3>
            <h2 class="medium__title">Get in touch</h2>

            <div class="contact__column">
                <div class="contact__img">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.736382232864!2d116.11407567406042!3d6.030872828693872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x323b6b71ee4755e5%3A0xbd517e1c53212fd9!2sUniversity%20Malaysia%20Sabah!5e0!3m2!1sen!2smy!4v1700788019385!5m2!1sen!2smy"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>   

                <div class="contact__form">
                    <form action="">
                        <div class="contact__box">
                            <div class="line1">
                                <!-- <label for="name">Name</label> -->
                                <input type="text" name="name" id="" placeholder="Your name">
                            </div>
    
                            <div class="line1">
                                <!-- <label for="email">Email</label> -->
                                <input type="email" name="email" id="email" placeholder="Your email">
    
                            </div>
    
                            <div class="line1">
                                <!-- <label for="message">Message</label> -->
                                <textarea name="message" id="" cols="30" rows="10" placeholder="Your message"></textarea>
                            </div>
    
                            <button class="btn">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </section>
    
    
@endsection