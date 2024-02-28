
<style>
    .menu {
        display: flex;
        flex-direction: column;
    }
</style>

@extends('UMS.dashboard.layouts.main')

   

    @php
      

        $imageUrl = $gallery->image
            ? (Str::startsWith($gallery->image, ['http://', 'https://'])
                ? $gallery->image
                : asset('storage/' . $gallery->image))
            : asset('path/to/placeholder-image.jpg');
    @endphp

@section('dash-content')

<div class="button return">
    <button class="btn"><a href="/dashboard/gallery">See gallery list</a></button>

</div>

<div class="menu">
    <div class="left">
        <div class="img" style="width: 150%; height: auto;">
            <img src="{{ $imageUrl }}" alt="" srcset="" >
        </div>
    </div>

    <div class="right">
        {{-- <h3><span class="icon"><i class="{{ $icon }}"></i></span><span class="category"></span></h3> --}}
        <h1></h1>
        <div class="review">
            <h2>{{ $gallery->title }}</h2>
        </div>
        <div class="status">
            
        </div>
        <p class="description">
            
        </p>
    </div>
</div>

<div class="buttons">
    <ul class="activity">
        <li class="edit"><a href="/dashboard/gallery/{{ $gallery->id }}/edit"><button><i class="bi bi-pencil-square"></i> Edit</button></a></li>
        <form action="/dashboard/gallery/{{ $gallery->id }}" method="post">
            @method('delete')
            @csrf
            <li class="delete" onclick="return confirm('Are you sure you want to delete an item?')"><button type="submit"><i class="bi bi-trash"></i> Delete</button></li>

        </form>
    </ul>
</div>
@endsection