@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<div class="overview">
    <div class="title">
        <i class="bi bi-sticky"></i>                    
        <span class="text">Feedback</span>
        
    </div>

    <div class="date">
        <span id="date"></span>
    </div>

   
    
</div>



<!-- food form to add -->
<h1>Please tell us what do you think of our system</h1>
<form action="/dashboard/feedback" class="food" method="post">
    @csrf
    <div class="contents">
        <div class="left">
            
            <div class="first content">
                <h1>Title</h1>
                <div class="line"></div>
                <div class="flex input">
                    <input type="text" name="title" id="" class="foodName" placeholder="eg: Cafeteria XYZ">
        
                    

                    
                </div>
            </div>

            

            

            <div class="second content">
                <h1>Message</h1>
                <div class="line"></div>
                <textarea name="message" id="" cols="30" rows="10" placeholder="Enter description"></textarea>
            </div>

            


            <!-- <div class="third content">
                <h1>Place Slug</h1>
                <div class="line"></div>
                <input type="text" name="" id="" placeholder="Slug">
            </div> -->
        </div>

        <div class="right">
            <div class="fourth content">
                <h1>Submit</h1>
                <div class="line"></div>
                <div class="published">
                    <i class="ri-calendar-line"></i>
                    Created on: <span class="date">30 Nov 2023 8:30 PM</span>
                </div>
                <div class="button">
                    <button type="submit" class="btn">Submit</button>
                </div>
            </div>
        </div>
    </div>
    
</form>
@endsection