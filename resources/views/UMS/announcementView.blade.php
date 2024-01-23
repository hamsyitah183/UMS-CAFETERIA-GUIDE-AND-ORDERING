@extends('UMS.layout.main')



@section('container')
    <!-- hero -->
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
                <img src="{{ $announcement->image }}" alt="">
    
            </div>
            <div class="container body">
                <div class="top">
                    <h2 class="title text">{{ $announcement->title }}</h2>
                    <h3 class="place ">{{ $announcement->place }}</h3>
                    <div class="time">
                        <span class="start">{{ $start->format('d M Y h : i A') }}</span> 
                            until 
                        <span class="end">{{ $end->format('d M Y h : i A') }}</span>
                    </div>
                </div>
    
                <div class="bodyText">
                    <p>
                        {{ $announcement->body }}
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