@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<style>
    nav ~ .dashboard, body {
        background-color: #fff;
    }

    .img-preview {
        width: 400px;
        height: 300px;
        object-fit: cover
    }

    .activity {
        display: flex;
        place-content: end;
        margin-right: 30%;
    }
</style>
<div class="overview">
    <div class="title">
        <i class="ri-gallery-line"></i>
        <span class="text">Gallery</span>
        
    </div>

    <div class="date">
        <span id="date"></span>
    </div>

    
</div>


<div class="galleryForm">
    <form action="/dashboard/gallery/{{ $gallery->id }}"  method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="file">
            <input type="hidden" name="oldImage" value="{{ $gallery->image }}">
                    @if ($gallery->image)
                        @if (Str::startsWith($gallery->image, ['http://', 'https://']))
                            <!-- External image from the internet -->
                            <div style="width: 60%">
                                <img src="{{ $gallery->image }}" alt="" class="image img-preview">
                            </div>
                        @else
                            <!-- Image from Laravel public storage -->
                            <div style="width: 60%">
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="" class="image img-preview">
                            </div>
                        @endif
                
                    @else
                        <img src="{{ asset('path/to/placeholder-image.jpg') }}" alt="" class="image">
                    @endif
            <input type="file" name="image" id="image"  @error('image')
            is-invalid
            @enderror value="{{ old('image') }}" onchange='previewImage()'>
                    
        </div>


        <div class="text">

            <input type="text" name="title" id="" placeholder="image title" value=" {{ old('title', $gallery->title) }}">
        </div>

        <div class="activity">
            <button class="btn">Submit</button>
        </div>
    </form>
</div>


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