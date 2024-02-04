@extends('UMS.dashboard.layouts.main')
{{-- @dd($orders) --}}
<style>
    
.from {
    background-color: #f7e1e1;
    padding: 10px;
    width: fit-content;
    font-size: 15px;
    font-weight: 500;
    color: #810000;
}
</style>
@section('dash-content')
<div class="overview">
    <div class="title">
        <i class="ri-cake-2-line"></i>                    
        <span class="text">Request</span>
        
    </div>

    <div class="date">
        <span id="date"></span>
    </div>

    <div class="from">
        <p>This is a form request to become an owner !</p>
    </div>
   
    
</div>

{{-- @dd() --}}

<!-- food form to add -->
<form action="{{  url('/dashboard/request') }}" class="food" method="post" enctype="multipart/form-data">
    @csrf
    <div class="contents">
        <div class="left">
            <div class="first content">
                <h1>Name</h1>
                <div class="line"></div>
                <div class="flex input">
                    <input type="text" name="name" id="" class="foodName" placeholder="eg: " value="{{ $user->name }}" disabled>
        
                    

                    
                </div>
            </div>

            

            

            <div class="second content">
                <h1>Why do you need an owner account?</h1>
                <div class="line"></div>
                <textarea name="question" id="" cols="30" rows="10" placeholder="Enter description"
                @error('question') is-invalid @enderror >

                @error('question')
                    <div class="invalid">
                        {{ $message }}
                    </div>
                @enderror
                {{ old('question') }}
                </textarea>
            </div>


             <div class="second content">
                <h1>What is your place name ?</h1>
                <div class="line"></div>
                <input type="text" name="place_name" id="" placeholder="Place name" 
                @error('place_name') is-invalid @enderror value="{{ old('place_name') }}">

                @error('place_name')
                    <div class="invalid">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="second content">
                <h1>What is your place phone number?</h1>
                <div class="line"></div>
                <input type="text" name="phoneNumber" id="" placeholder="01234567"
                @error('phoneNumber') is-invalid @enderror value="{{ old('phoneNumber') }}">

                @error('phoneNumber')
                    <div class="invalid">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="second content">
                <h1>Give us the picture of your place</h1>
                <div class="line"></div>
                <input type="file" name="image" id="">
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