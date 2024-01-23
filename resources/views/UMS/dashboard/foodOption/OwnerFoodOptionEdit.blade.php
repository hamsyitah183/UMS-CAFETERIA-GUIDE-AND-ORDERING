@extends('UMS.dashboard.layouts.main')

<style>
    .img-preview {
        width: 400px;
        height: 300px;
        object-fit: cover;
        margin: 10px 40px;
    }
</style>

@section('dash-content')
<div class="overview">
    <div class="title">
        <i class="ri-store-2-line"></i>                    
        <span class="text">Food Option</span>
        
    </div>

    <div class="date">
        <span id="date"></span>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
</div>


{{-- <h1>{{ $test }}</h1> --}}
<!-- food form to add -->
<form action="/dashboard/foodOption/{{ $foodOption->id }}" class="food" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="contents">
        <div class="left">
            <div class="first content">
                <h1>Place name</h1>
                <div class="line"></div>
                <div class="flex input">
                    <input type="text" name="place_name" id="placeName" class="foodName" placeholder="eg: Cafeteria XYZ" @error('place_name') 
                    is-invalid @enderror value="{{ old('place_name', $foodOption->place_name) }}">

                    @error('place_name')
                        <div class="invalid">
                            {{ $message }}
                        </div>
                    @enderror
        
                    

                    
                </div>
            </div>

            <div class="content">
                <h1>Owner name</h1>
                <div class="line"></div>
                <input type="text" name="" id="" value="{{ $foodOption->owner->username }} ({{ auth()->user()->id }})" disabled >
            </div>

            <div class="content">
                <h1>Type</h1>
                <div class="line"></div>
                <select id="type" name="type" @error('type') is-invalid @enderror value="{{ old('type', $foodOption->type ) }}">

                    @error('type')
                        <div class="invalid">
                            {{ $message }}
                        </div>
                    @enderror

                    <option value="1">Cafeteria</option>
                    <option value="2">Kiosk</option>
                    <option value="3">Vendor</option>

                </select>
            </div>

            <div class="content">
                <h1>Cafeteria Number phone</h1>
                <div class="line"></div>
                <input type="text" name="phoneNumber" id="" placeholder="eg: 0143285433" @error('phoneNumber') is-invalid @enderror value="{{ old('phoneNumber', $foodOption->phoneNumber) }}">

                @error('phoneNumber')
                    <div class="invalid">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="content">
                <h1>Place Address</h1>
                <div class="line"></div>
                <input type="text" name="addressLine1" id="" placeholder="Cafeteria UMS, Fakulti Kejuruteraan" @error('addressLine1') is-invalid @enderror value="{{ old('addressLine1', $foodOption->addressLine1) }}">

                @error('phoneNumber')
                    <div class="invalid">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="content">
                <h1>Profile Picture</h1>
                <div class="line"></div>
                <input type="hidden" name="oldImage" value="{{ $foodOption->image }}">
                    @if ($foodOption->image)
                        @if (Str::startsWith($foodOption->image, ['http://', 'https://']))
                            <!-- External image from the internet -->
                            <div>
                                <img src="{{ $foodOption->image }}" alt="" class="image img-preview">
                            </div>
                        @else
                            <!-- Image from Laravel public storage -->
                            <div>
                                <img src="{{ asset('storage/' . $foodOption->image) }}" alt="" class="image img-preview">
                            </div>
                        @endif
                    
                    @else
                        <img src="{{ asset('path/to/placeholder-image.jpg') }}" alt="" class="image">
                    @endif
                
                    {{-- <img src="" alt="" srcset="" class="img-preview img"> --}}

                    <input type="file" name="image" id="image"  @error('image')
                    is-invalide
                    @enderror value="{{ old('image') }}" onchange='previewImage()'>

                    @error('image')
                        <div class="invalid">
                            {{ $message }}
                        </div>
                    @enderror
            </div>

            <div class="second content">
                <h1>Description</h1>
                <div class="line"></div>
                <textarea name="description" id="" cols="30" rows="10" placeholder="Enter description" @error('title') is-invalid @enderror }}">
                   {{ old('description', $foodOption->description) }}
                  
                </textarea>
                @error('description')
                        <div class="invalid">
                            {{ $message }}
                        </div>
                    @enderror
            </div>

            


             {{-- <div class="third content">
                <h1>Place Slug</h1>
                <div class="line"></div>
                <input type="text" name="" id="placeSlug" placeholder="Slug" disabled>
            </div>  --}}
            
            
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