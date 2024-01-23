@extends('UMS.dashboard.layouts.main')

@section('dash-content')
@if (session()->has('success'))
        <div class="success">
            {{ session('success') }}
        </div>
@endif
{{-- @dd(auth()->user()) --}}

<style>
    .img-preview {
        width: 500px;
        height: 300px;
        object-fit: cover;
    }
</style>


<div class="overview">
    
    <div class="topContent">
        <div class="icon">
            <button class="back">
                <a href="/dashboard/announcement/announcementView.html">
                    <i class="bi bi-x"></i>
                    <span class="word">Cancel</span>
                </a>
            </button>
        </div>

    </div>

    <!-- content -->
    <div class="content">
        <div class="editForm">
            <form action="/dashboard/announcement/{{ $announcement->id }}" method="post" enctype='multipart/form-data'>
                @method('put')
                @csrf
                <div class="div">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $announcement->title) }}">
                </div>

                <div class="div">
                    <label for="title">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $announcement->slug) }}">
                </div>

                <div class="div">
                    <label for="start">Start</label>
                    <input type="datetime-local" name="start" id="start" value="{{ old('start', date('Y-m-d\TH:i', strtotime($announcement->start))) }}">
                </div>

                <div class="input image div">
                    
                    <label for="image">Image</label>
                    <input type="hidden" name="oldImage" value="{{ $announcement->image }}">
                    @if ($announcement->image)
                        @if (Str::startsWith($announcement->image, ['http://', 'https://']))
                            <!-- External image from the internet -->
                            <div>
                                <img src="{{ $announcement->image }}" alt="" class="image img-preview">
                            </div>
                        @else
                            <!-- Image from Laravel public storage -->
                            <div>
                                <img src="{{ asset('storage/' . $announcement->image) }}" alt="" class="image img-preview">
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

                <div class="div">
                    <label for="end">End</label>
                    <input type="datetime-local" name="end" id="end" value="{{ old('end', date('Y-m-d\TH:i', strtotime($announcement->end))) }}">
                </div>

                <div class="div">
                    <label for="place">Place</label>
                    <input type="text" name="place" id="end" value="{{ old('place', $announcement->place) }}">
                </div>

                {{-- <div class="div">
                    <label for="image">Image</label>
                    <input type="file" src="" alt="" >
                </div> --}}

                <div class="div">
                    <label for="content">Content</label>
                    <textarea name="body" id="content" cols="30" rows="10" >{{ old('content', $announcement->body) }}</textarea>
                </div>

                

                <div class="div">
                    <div class="icon">
                        <button type="submit">
                            
                                <i class="bi bi-check"></i>
                                <span class="word">Update</span>
                            
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>


    

    
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/announcement/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>

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

<div class="container">
    <a href="#hero" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line"></i>
    </a>
 </div>

 
@endsection