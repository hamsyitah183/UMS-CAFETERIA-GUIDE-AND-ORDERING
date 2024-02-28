@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<div class="overview">
    <div class="title">
        <i class="ri-gallery-line"></i>
        <span class="text">Gallery</span>
        
    </div>

    <div class="date">
        <span id="date"></span>
    </div>

    
</div>

{{-- @dd($galleries) --}}

<div class="gallerySearch">
    <div class="searchs">
        <input type="text" placeholder="search gallery">
        <button><i class="ri-search-line"></i></button>
    </div>
    
</div>

<div class="add">
    <button class="btn"><a href="/dashboard/gallery/create"><i class="ri-add-line"></i> Add new</a></button>
</div>
<!-- new breakfast item -->



<!-- content -->
<div class="content">
    <div class="galleries">
        
        @foreach ($galleries as $gallery)
        <div class="gallery">
            <div class="img">
                @if ($gallery->image)
                    @if (Str::startsWith($gallery->image, ['http://', 'https://']))
                        <!-- External image from the internet -->
                        <img src="{{ $gallery->image }}" alt="" class="image">
                    @else
                        <!-- Image from Laravel public storage -->
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="" class="image">
                    @endif
                @else
                    <!-- Display a placeholder or default image when no image is available -->
                    <img src="{{ asset('path/to/placeholder-image.jpg') }}" alt="" class="image">
                @endif
            </div>
            <div class="title">
                {{ $gallery->title }}
            </div>
            

            <div class="activity">
                <button class="btn view"><a href="/dashboard/gallery/{{ $gallery->id }}"><i class="bi bi-eye"></i> View</a></button>

                <div class="right" style="display: flex; gap: 10px;">
                    <button class="btn edit"><a href="/dashboard/gallery/{{ $gallery->id }}/edit"><i class="bi bi-pencil-square"></i> Edit</a></button>
                    <form action="/dashboard/gallery/{{ $gallery->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn delete" onclick="return confirm('Are you sure you want to delete an item?')"><i class="bi bi-trash"></i> Delete</button>
            
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        
    </div>
</div>
@endsection