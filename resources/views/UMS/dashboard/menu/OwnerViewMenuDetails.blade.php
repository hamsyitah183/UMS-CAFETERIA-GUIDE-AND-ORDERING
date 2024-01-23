
@extends('UMS.dashboard.layouts.main')

    @if ($menu->category == 'Breakfast')
        @php
            // $items = $breakfasts;
            $icon = 'ri-sun-foggy-line';
            $name = 'Breakfast';
        @endphp

    @elseif ($menu->category == 'Lunch')
        @php
            // $items = $lunchs;
            $icon = 'ri-sun-line';
            $name = 'Lunch';
        @endphp

    @elseif ($menu->category == 'Drink')
        @php
            // $items = $lunchs;
            $icon = 'bi bi-cup-straw';
            $name = 'Drink';    
        @endphp

    @endif

    @php
        
        
        
        if ($menu->image == NULL) {
                $menu->image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQihCQgZa4NQhg2aMeP1hRGApIXvKoq6IH_AnLILn3xpA&s';
            }

        if ($menu->status == 'in_stock') {
            $status = 'In stock';
        }
        elseif ($menu->status == 'out_of_stock') {
            # code...
            $status = 'Out of stock';
        }

        $imageUrl = $menu->image
            ? (Str::startsWith($menu->image, ['http://', 'https://'])
                ? $menu->image
                : asset('storage/' . $menu->image))
            : asset('path/to/placeholder-image.jpg');
    @endphp

@section('dash-content')

<div class="button return">
    <button class="btn"><a href="{{ url()->previous() }}">See {{ $name }} list</a></button>

</div>

<div class="menu">
    <div class="left">
        <div class="img">
            <img src="{{ $imageUrl }}" alt="" srcset="">
        </div>
    </div>

    <div class="right">
        <h3><span class="icon"><i class="{{ $icon }}"></i></span><span class="category">{{ $name }}</span></h3>
        <h1>{{ $menu->name }}</h1>
        <div class="review">
            20 reviews
        </div>
        <div class="status">
            {{ $status }}
        </div>
        <p class="description">
            {{ $menu->description }}
        </p>
    </div>
</div>

<div class="buttons">
    <ul class="activity">
        <li class="edit"><a href="/dashboard/menu/{{ $menu->id }}/edit"><button><i class="bi bi-pencil-square"></i> Edit</button></a></li>
        <li class="delete"><a href="#"><button><i class="bi bi-trash"></i> Delete</button></a></li>
    </ul>
</div>
@endsection