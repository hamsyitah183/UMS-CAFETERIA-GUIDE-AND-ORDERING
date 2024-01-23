@extends('UMS/layout/main')
{{-- @dd($announcements->admin) --}}
@section('container')
<section class="hero" id="hero">
    <div class="hero__container container">
       <div class="hero__caption">
            <h3 class="small__title">announcement</h3>

            <h2 class="medium__title">
                <span class="highlight">Stay informed: </span><br>
                Important<br><span class="highlight">Annoucements</span> in <br>
                UMS Cafeteria
            </h2>

            <p class="paragraph">
                Eat, Share, Repeat: Savor the Flavor of Campus Dining!
            </p>
       </div>

       <div class="hero__image">
            <img src="https://images.pexels.com/photos/1435735/pexels-photo-1435735.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
       </div>
    </div>
</section>


<!-- announcement -->
<section class="announcement" id="announcement">
    <div class="announcement__container container">
        
        @if ($announcements->count())

        @foreach ($announcements as $announcement)
        {{-- change the start and end to date time first --}}
        <?php
            $start = new DateTime ($announcement->start); 
            $end = new DateTime ($announcement->end)   
        ?>
        <div class="announcements">
            <div class="announcement__dates">
                <h2 class="month">{{ $start->format('M') }}</h2>
                <h2 class="dates">{{ $start->format('d') }}</h2>
            </div>

            <div class="announcement__image">
                <img src="{{ $announcement->image }}" alt="" srcset="">
            </div>

            <div class="announcement__caption">
                <a href="/announcement/{{ $announcement->slug }}"><h3>Announcement: {{ $announcement->title }}</h3></a>
                <p class="place">{{ $announcement->place }}</p>
                <p>{{ $start->format('h.i A') }} - {{ $end->format('h.i A') }}</p>
            </div>
        </div>

        <div class="line"></div>
        
        @endforeach
        <div class="mt-5">
            {{ $announcements->fragment('announcement')->links() }}
        </div>

        
            
        @endif
    </div>

    
</section>
@endsection