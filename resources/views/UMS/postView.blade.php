@extends('UMS.layout.main')



@section('container')
    <!-- hero -->
    <div class="activity" style="margin-top: 250px; margin-left: 150px">
        <div class="button">
            <button class="btn"><a href="/individual/{{ $announcement->place_id }}/post">Back</a></button>
        </div>
    </div>
    <section class="announcementBody container">
        <!-- <div class="container return">
            <i class="ri-arrow-left-line"></i>
        </div> -->
        <?php
            $start = new DateTime ($announcement->start); 
            $end = new DateTime ($announcement->end)   
        ?>
        <div class="containers">
            <div class="img">

                @php
                    $imageUrl = $announcement->image
                        ? (Str::startsWith($announcement->image, ['http://', 'https://'])
                            ? $announcement->image
                            : asset('storage/' . $announcement->image))
                        : ' https://drawcartoonstyle.com/wp-content/uploads/2022/05/10-draw-the-french-fries-1024x823.jpg';
                @endphp
                {{-- https://drawcartoonstyle.com/wp-content/uploads/2022/05/10-draw-the-french-fries-1024x823.jpg --}}
                <img src="{{ $imageUrl }}" alt="" srcset="">
    
            </div>
            <div class="container body">
                <div class="top">
                    <h2 class="title text">{{ $announcement->title }}</h2>
                    <h3 class="place ">Status: {{ $announcement->status }}</h3>
                   
                </div>
    
                <div class="bodyText">
                    <p>
                        {{ $announcement->content }}
                    </p>
                </div>
            </div>
        </div>

        <div class="about">
            <div class="img">
               <img src="https://assets.bharian.com.my/images/articles/umstangguh28-o_BHfield_image_socialmedia.var_1601296332.jpg" alt="" srcset="">
            </div>

            <div class="word">
               <h4>About us</h4>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae eligendi ducimus cumque doloremque neque nostrum, numquam iste minima qui aspernatur!</p>
            </div>
        </div>
    </section>
    
@endsection