@extends('UMS.layout.main')

{{-- @dd($carts) --}}


@section('container')
<section class="hero" id="hero">
    <img src="https://images.pexels.com/photos/2293367/pexels-photo-2293367.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
    <div class="hero__container container">
        <div class="small__title">Cart</div>
        <div class="medium__title">Your Campus Cravings, <br><span class="highlight">Ready to Order</span></div>
    </div>
</section>

<p class="container back"><a href="">Back to cart</a></p>

<div class="cart container">
    <div class="left">
        <div class="img">
            @php
                $imageUrl = $carts->menu->image
                    ? (Str::startsWith($carts->menu->image, ['http://', 'https://'])
                        ? $carts->menu->image
                        : asset('storage/' . $carts->menu->image))
                    : 'https://png.pngtree.com/png-vector/20221125/ourmid/pngtree-flat-design-vector-illustration-of-kitchen-utensils-icon-featuring-knife-fork-and-spoon-sign-vector-png-image_41146732.jpg';
            @endphp
            <img src="{{ $imageUrl }}" alt="">
        </div>
    </div>

    <div class="right">
        <form action="/editCartData/{{ $carts->id }}" method="post">
            @csrf
            <h2 class="title">{{ $carts->menu->name }}</h2>
            <p class="small">{{ $carts->menu->description }}</p>
            <input type="number" name="quantity" id="" min="1"  value={{ old("quantity", $carts->quantity) }}>
            <div class="notes">
                <label for="notes" class="titleNote">Notes</label>
                <textarea name="info" id="" cols="30" rows="10">{{ old('info', $carts->info) }}</textarea>
            </div>

            <div class="activty">
                <button class="btn" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection