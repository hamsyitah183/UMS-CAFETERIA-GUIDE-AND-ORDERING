<div class="owners flex">
    <div class="leftSide">
        <div class="about">
            <h1>About us</h1>
            <div class="line"></div>
            @if ($owner->foodOption && $owner->foodOption->image)
                @php
                    $imageUrl = $owner->foodOption->image
                    ? (Str::startsWith($owner->foodOption->image, ['http://', 'https://'])
                        ? $owner->foodOption->image
                        : asset('storage/' . $owner->foodOption->image))
                    : asset('path/to/placeholder-image.jpg');
                @endphp
                <img src="{{ $imageUrl }}" alt="">
            @else
                <img src="https://uxwing.com/wp-content/themes/uxwing/download/food-and-drinks/food-restaurant-icon.png" alt="" srcset="">
            @endif
            <p>
                @if ($owner->foodOption && $owner->foodOption->description)
                    {{ $owner->foodOption->description }}
                @else
                    No description
                @endif
                
            </p>
        </div>
        <div class="reviews">
            <div class="box3">
                {{-- @dd($owner->foodOption->reviewAndRating) --}}
                <h1>Review and rating</h1>

                <div class="line"></div>

                <div class="content">
                    @if ($owner->foodOption && $owner->foodOption->reviewAndRating)
                    @foreach ($owner->foodOption->reviewAndRating as $review)
                    <div class="review">
                        <div class="tops">
                            <div class="profiles">
                            <div class="img">
                                <img src="https://images.pexels.com/photos/1870376/pexels-photo-1870376.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
                            </div>

                        </div>

                        <div class="details">
                            <div class="info">
                                @if ($review->user && $review->user->id)
                                    <h3 class="customer_id">User id: {{ $review->user->id }}</h3>
                                @else
                    
                                    <h3 class="customer_id">Guest</h3>
                                @endif

                                @if ($review->user && $review->user->username)
                                    <p class="customer_name">{{ $review->user->username }}</p>
                                @else
                    
                                <p class="customer_name">Guest</p>

                                @endif

                                <p class="date">{{ $review->created_at->format('j M y, g:i a') }}</p>
                            </div>

                            <div class="comment">
                                <p class="rating"><span class="number">{{ $review->rate }} </span>/5</p>
                                
                                
                            </div>
                        </div>
                        </div>
                        
                        <div class="bottom">
                            <div class="titles">
                                <h3>{{ Str::limit($review->message,10) }}...</h3>
                            </div>
                            <i class="ri-double-quotes-l"></i><p>{{ $review->message }}</p>
                            <i class="ri-double-quotes-r"></i>
                        </div>
                    </div>
                    @endforeach
                    @else
                        no review yet, please make a food option first
                    @endif
                    

                    
                </div>
            </div>
        </div>
    </div>

    
    <div class="swiper announcement mySwiper">
        <h1>Announcement</h1>
        <div class="line"></div>

        <div class="swiper-wrapper announcements">
            @if ($announcements->count()>0)
            @foreach ($announcements as $announcement)
            <div class="swiper-slide item">
                <div class="adminProfile">
                    <div class="info">
                        <div class="img">
                            <img src="https://images.pexels.com/photos/2085831/pexels-photo-2085831.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
                        </div>
                        <div class="name">
                            {{ $announcement->admin->name }}
                        </div>
                    </div>

                    <div class="lastUpdate">
                        <p>{{ $announcement->updated_at }}</p>
                    </div>
                    
                </div>

                <div class="itemContent">
                    <div class="img">
                        @php
                        $imageUrl = $announcement->image
                            ? (Str::startsWith($announcement->image, ['http://', 'https://'])
                                ? $announcement->image
                                : asset('storage/' . $announcement->image))
                            : asset('path/to/placeholder-image.jpg');
                        @endphp
                        <img src="{{ $imageUrl }}" alt="" srcset="">
                    </div>
                    <div class="titles">
                        <h2>{{ $announcement->title }}</h2>
                    </div>
                    <div class="time">
                        <span class="bold">{{ $announcement->start }}</span> until <span class="bold">{{ $announcement->end }}</span>
                    </div>
                    <div class="location">
                        <p>{{ $announcement->place }}</p>
                    </div>
                    <div class="body">
                        <p>
                            {{ Str::limit($announcement->body, 60, ' ...') }}
                        </p>
                    </div>

                    <div class="read">
                        <a href="/dashboard/announcement/{{ $announcement->id }}">Read More <i class="ri-eye-line"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
                
            @endif

            {{-- <div class="swiper-slide item">
                <div class="adminProfile">
                    <div class="info">
                        <div class="img">
                            <img src="https://images.pexels.com/photos/2085831/pexels-photo-2085831.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
                        </div>
                        <div class="name">
                            Admin 1
                        </div>
                    </div>

                    <div class="lastUpdate">
                        <p>2 days ago</p>
                    </div>
                    
                </div>

                <div class="itemContent">
                    <div class="img">
                        <img src="https://www.emmymade.com/wp-content/uploads/2021/11/korean-corn-dogs.jpeg" alt="" srcset="">
                    </div>
                    <div class="titles">
                        <h2>Lorem ipsum dolor sit.</h2>
                    </div>
                    <div class="time">
                        <span class="bold">1 DEC 2023 10:00 AM</span> until <span class="bold">2 DEC 2023 11:00 PM</span>
                    </div>
                    <div class="location">
                        <p>Dataran Kawad</p>
                    </div>
                    <div class="body">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae excepturi odio neque omnis amet obcaecati. Corrupti recusandae quis ratione officia?
                        </p>
                    </div>

                    <div class="read">
                        <a href="">Read More <i class="ri-eye-line"></i></a>
                    </div>
                </div>
            </div> --}}
            
        </div>

        <div class="button">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>