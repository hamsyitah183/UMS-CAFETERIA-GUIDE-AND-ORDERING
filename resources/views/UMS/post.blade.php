@extends('UMS/layout/main')
{{-- @dd($announcements->admin) --}}
@section('container')
<section class="hero" id="hero" style="background-color: #d2f4f1 ">
    <div class="hero__container container">
       <div class="hero__caption">
            <h3 class="small__title">post</h3>

            <h2 class="medium__title">
                <span class="highlight">Stay informed: </span><br>
                Important<br><span class="highlight">Posts</span> in <br>
                Our cafeteris
            </h2>

            <p class="paragraph">
                Eat, Share, Repeat: Savor the Flavor of Campus Dining!
            </p>
       </div>

       <div class="hero__image">
            
            <img src="https://images.pexels.com/photos/1395958/pexels-photo-1395958.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
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
            $start = new DateTime ($announcement->created_at); 
            $end = new DateTime ($announcement->end)   
        ?>
        <div class="announcements">
            <div class="announcement__dates">
                <h2 class="month">{{ $start->format('M') }}</h2>
                <h2 class="dates">{{ $start->format('d') }}</h2>
            </div>
            <div class="announcement__image">
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

            <div class="announcement__caption">
                <a href="/individual/{{ $announcement->place_id }}/post/{{ $announcement->id }}"><h3>Post: {{ $announcement->title }}</h3></a>
                <p class="place">Status : {{ $announcement->status }}</p>
                
            </div>
        </div>

        <div class="line"></div>
        
        @endforeach
        {{-- <div class="mt-5">
            {{ $announcements->fragment('announcement')->links() }}
        </div> --}}

        
            
        @endif
    </div>

    
</section>
@endsection