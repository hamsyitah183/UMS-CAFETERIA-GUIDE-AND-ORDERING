@extends('UMS.dashboard.layouts.main')

<style>
    .img-preview {
        width: 300px;
        height: 200px;
        object-fit: cover;
    }

    
</style>

@section('dash-content')

@section('dash-content')
@if (session()->has('success'))
        <div class="success">
            {{ session('success') }}
        </div>
@endif

@php
    if(Str::contains(url()->previous(), 'dashboard/menu/list/breakfast')) {
            $icon = 'ri-sun-foggy-line';
            $name = 'Breakfast';
            $back = '/dashboard/menu/list/breakfast';
        }

        elseif(Str::contains(url()->previous(), 'dashboard/menu/list/lunch')) {
            $icon = 'ri-sun-line';
            $name = 'Lunch';
            $back = '/dashboard/menu/list/lunch';

        }

        elseif(Str::contains(url()->previous(), 'dashboard/menu/list/drink')) {
            $icon = 'bi bi-cup-straw';
            $name = 'Drink';    
            $back = '/dashboard/menu/list/drinks';

        }

        elseif(Str::contains(url()->previous(), 'dashboard/menu/list/all')) {
            $icon = 'ri-restaurant-line';
            $name = 'Menu';
            $back = '/dashboard/menu/list/all';

        }

        else {
            $icon = 'ri-restaurant-line';
            $name = 'Menu';
        }
@endphp

<div class="overview">
    <div class="title">
        <i class="bi bi-journals"></i>
        <span class="text">Menu</span>
        
    </div>

   

    <div class="date">
        <span id="date"></span>
    </div>

   <h2 class="small__title"><i class="{{ $icon }}"></i> Edit {{ $name }}</h2>
    
</div>

<div class="see">

    

   
    {{-- @dd(url()->previous()) --}}

    <button class="btn"><a href="{{ $back }}">See {{ $name }} list</a></button>
</div>



<!-- food form to add -->
<form action="/dashboard/menu/{{ $menu->id }}" class="food" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="contents">
        <div class="left">
            <div class="first content">
                <h1>Food</h1>
                <div class="line"></div>
                <div class="flex input">
                    <input type="text" name="name" id="" class="foodName" placeholder="Food Name" value="{{ old('name', $menu->name) }}">
        
                    <input type="text" placeholder="Price" name="price" value="{{ old('price', $menu->price) }}">

                    <input type="hidden" name="oldImage" value="{{ $menu->image }}">
                    @if ($menu->image)
                        @if (Str::startsWith($menu->image, ['http://', 'https://']))
                            <!-- External image from the internet -->
                            <div>
                                <img src="{{ $menu->image }}" alt="" class="image img-preview">
                            </div>
                        @else
                            <!-- Image from Laravel public storage -->
                            <div>
                                <img src="{{ asset('storage/' . $menu->image) }}" alt="" class="image img-preview">
                            </div>
                        @endif
                
                    @else
                        <img src="{{ asset('path/to/placeholder-image.jpg') }}" alt="" class="image">
                    @endif
                
                    {{-- <img src="" alt="" srcset="" class="img-preview img"> --}}

                    <input type="file" name="image" id="image"  @error('image')
                    is-invalid
                    @enderror value="{{ old('image') }}" onchange='previewImage()'>
                    
                </div>
                
            </div>

            <div class="content">
                <h1>Category</h1>
                <div class="line"></div>
                <select id="category" name="category">
                    @if (old('category', $menu->category) == 'Breakfast')
                        <option value="Breakfast" selected>Breakfast</option>
                    @endif

                    @if (old('category', $menu->category) == 'Lunch')
                    <option value="Lunch" selected>Lunch</option>
                    @endif

                    @if (old('category', $menu->category) == 'Drink')
                    <option value="Drink"  selected>Drink</option>
                    @endif
                    

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
                <textarea name="description" id="" cols="30" rows="10" placeholder="Enter description">{{ old('description', $menu->description) }}</textarea>
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
@endsection