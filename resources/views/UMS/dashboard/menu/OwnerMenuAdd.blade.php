@extends('UMS.dashboard.layouts.main')

<style>
    .img-preview {
        width: 300px;
        height: 200px;
        object-fit: cover;
    }

    
</style>


@section('dash-content')
@if (session()->has('success'))
        <div class="success">
            {{ session('success') }}
        </div>
@endif

<div class="overview">
    <div class="title">
        <i class="bi bi-journals"></i>
        <span class="text">Menu</span>
        
    </div>

    @php
        if(Str::contains(url()->previous(), 'dashboard/menu/list/breakfast')) {
            $icon = 'ri-sun-foggy-line';
            $name = 'Breakfast';
        }

        elseif(Str::contains(url()->previous(), 'dashboard/menu/list/lunch')) {
            $icon = 'ri-sun-line';
            $name = 'Lunch';
        }

        elseif(Str::contains(url()->previous(), 'dashboard/menu/list/drink')) {
            $icon = 'bi bi-cup-straw';
            $name = 'Drink';    
        }

        elseif(Str::contains(url()->previous(), 'dashboard/menu/list/all')) {
            $icon = 'ri-restaurant-line';
            $name = 'Menu';
        }

        else {
            $icon = 'ri-restaurant-line';
            $name = 'Menu';
        }

    @endphp

    <div class="date">
        <span id="date"></span>
    </div>

   <h2 class="small__title"><i class="{{ $icon }}"></i> {{ $name }}</h2>
    
</div>

<div class="see">

    

   
    {{-- @dd(url()->previous()) --}}

    <button class="btn"><a href="{{ url()->previous() }}">See {{ $name }} list</a></button>
</div>


<!-- food form to add -->
<form action="/dashboard/menu" class="food" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="contents">
        <div class="left">
            <div class="first content">
                <h1>Food</h1>
                <div class="line"></div>
                <div class="flex input">
                    <input type="text" name="name" id="" class="foodName" placeholder="Food Name">
        
                    <input type="text" placeholder="Price" name="price">

                    <img src="" alt="" srcset="" class="img-preview">
                    <input type="file" name="image" id="image" onchange='previewImage()'>

                    
                </div>
            </div>

            <div class="content">
                <h1>Category</h1>
                <div class="line"></div>
                <select id="category" name="category">
                    <option value="Breakfast"  @if($name === 'Breakfast') selected @endif>Breakfast</option>
                    <option value="Lunch" @if($name === 'Lunch') selected @endif>Lunch</option>
                    <option value="Drink" @if($name === 'Drink') selected @endif>Drink</option>

                </select>
            </div>

            <div class="content">
                <h1>Status</h1>
                <div class="line"></div>
                <select id="status" name="status" >
                    <option value="in_stock">In stock</option>
                    <option value="out_of_stock">Not in stock</option>
                </select>
            </div>

            <div class="second content">
                <h1>Description</h1>
                <div class="line"></div>
                <textarea name="description" id="" cols="30" rows="10" placeholder="Enter description"></textarea>
            </div>


            {{-- <div class="third content">
                <h1>Slug</h1>
                <div class="line"></div>
                <input type="text" name="" id="" placeholder="Slug">
            </div> --}}
        </div>

        <div class="right">
            <div class="fourth content">
                <h1>Publish</h1>
                <div class="line"></div>
                <div class="published">
                    <i class="ri-calendar-line"></i>
                    Published on: <span class="date">{{ now()->format('d M Y, g:i a') }}</span>
                </div>
                <div class="button">
                    <button type="submit" class="btn">Submit</button>
                </div>
            </div>
        </div>
    </div>
    
</form>
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');


        imgPreview.style.display = 'block';

        const oFReader = new FileReader();

        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection