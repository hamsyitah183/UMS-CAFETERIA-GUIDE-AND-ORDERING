@extends('UMS.layout.main')

@section('container')
<section class="hero container">
    <h1 class="big__title">Review and Rating</h1>
    <!-- <p class="medium__title"></p> -->
    <a href="">Back to page</a>
</section>


<!-- review -->

@php
    $averages = [];
    foreach ($reviews as $review) {
        $averages[] = $review->rate;
        
        
    }

    $average = count($averages) > 0 ? number_format(array_sum($averages) / count($averages), 1) : 0;
    
@endphp
{{-- @dd($average) --}}
<section class="review">
    <div class="review__container container">
    
        <div class="reviews">
            <div class="summary">
                <div class="number">
                    <h1><span class="highlight">{{ $average }}</span> / 5</h1>
                </div>
                <div class="desc">
                    <p>Customer rating ({{ $reviews->count() }})</p>
                    
                </div>
            </div>
{{-- @dd($foodOptionId) --}}
            <div class="contents">
                @foreach ($reviews as $review)
                <div class="item">
                    <div class="top">
                        <div class="img">
                            <img src="https://images.pexels.com/photos/416160/pexels-photo-416160.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
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

                </div>
                @endforeach

                
            </div>

            <div class="mt-5">
                {{ $reviews->links() }}
            </div>

            <div class="add">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="/individual/{{ $foodOptionId }}/rating" id="review" method="post">
                    @csrf
                    <fieldset required>
                        <h2>Select your rating</h2>
                        <div class="bullet">
                            <div class="div">
                                <input type="radio" id="age1" name="rate" value="1">
                                <div id="ageDiv1" onclick="handleDivClick('age1', 'selected')" class="number">1</div>
                            </div>
                        
                            <div>
                                <input type="radio" id="age2" name="rate" value="2">
                                <div id="ageDiv2" onclick="handleDivClick('age2', 'selected')"   class="number">2</div>
                            </div>
                        
                            <div>
                                <input type="radio" id="age3" name="rate" value="3">
                                <div id="ageDiv3" onclick="handleDivClick('age3', 'selected')"   class="number">3</div>
                        
                            </div>
                        
                            <div>
                                <input type="radio" id="age4" name="rate" value="4">
                                <div id="ageDiv4" onclick="handleDivClick('age4', 'selected')"  class="number">4</div>
                            </div>
                        
                            <div>
                                <input type="radio" id="age5" name="rate" value="5">
                                <div id="ageDiv5" onclick="handleDivClick('age5', 'selected')"  class="number">5</div>
                            </div>
                        </div>
                        

                    </fieldset>
                    <div class="content">
                        <h2>Your Review</h2>
                        @if (auth()->user() && auth()->user()->username)
                            <input type="text" name="name" id="" placeholder="name" value="{{ auth()->user()->username }}" disabled>
                        @else
                            <input type="text" name="name" id="" placeholder="name" value="guest" disabled>
                        @endif
                        <textarea name="message" id="" cols="30" rows="10" placeholder="your review"></textarea>
                    </div>

                    <button class="btn">Submit</button>
                </form>
            </div>


        </div>
    </div>
</section>

<script>
    function handleDivClick(radioButtonId, className) {
    // Get references to the radio button and the div
    var radioButton = document.getElementById(radioButtonId);
    var divElement = document.getElementById('ageDiv' + radioButtonId.charAt(radioButtonId.length - 1));
    
    // Remove the class from all divs
    var allDivs = document.querySelectorAll('[id^="ageDiv"]');
    allDivs.forEach(function (div) {
        div.classList.remove('big');
    });

    // Add a class to the clicked div
    divElement.classList.add('big');

    // Trigger a click on the radio button when the div is clicked
    radioButton.click();


    // console.log(radioButton)
}
    function review() {
            var bulletOne = document.querySelector('.bullet #ageDiv1');
            console.log(bulletOne);
            var text = document.getElementsByClassName(contentOfNumber);

            
    }
</script>
@endsection