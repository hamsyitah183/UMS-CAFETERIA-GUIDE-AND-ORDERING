@extends('UMS.layout.main')

@php
    // dd($shopping_cart);
@endphp

@section('container')

<div class="warning container">
    <h1>Warning! Your order has already been made.To make changes, go <a href="" class="highlight">here</a> 
        to edit or proceed straight to <a href="" class="highlight">payment!</a>

    </h1>
</div>

@endsection