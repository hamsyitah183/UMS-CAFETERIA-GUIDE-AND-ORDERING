@extends('UMS.dashboard.layouts.main')

@section('dash-content')



{{-- @if (request()->is('dashboard/menu'))
@dd($category->get())
@endif --}}
@php
    

    if(Str::contains(request()->path(), 'dashboard/menu'))
    {
        $all = $category2->get();
    }
    
    $breakfasts = $category->where('category', 'Breakfast');
    $lunchs = $category->where('category', 'Lunch');
    $drinks = $category->where('category', 'Drink');
    
    

    $currentRoute = request()->route()->getName();
@endphp

@if (Str::contains(request()->path(), 'dashboard/menu'))

    @php
        
        $items = $all;
        $icon = 'ri-sun-foggy-line';
        $name = 'Menu';
    @endphp


@elseif (request()->is('dashboard/breakfast'))
    @php
        $items = $breakfasts;
        $icon = 'ri-sun-foggy-line';
        $name = 'Breakfast';
    @endphp

@elseif (request()->is('dashboard/lunch'))
    @php
        $items = $lunchs;
        $icon = 'ri-sun-line';
        $name = 'Lunch';
    @endphp

@elseif (request()->is('dashboard/drinks'))
    @php
        $items = $drinks;
        $icon = 'bi bi-cup-straw';
        $name = 'Drink';
    @endphp



@endif



{{-- @dd($items) --}}

<div class="overview">
    <div class="title">
        <i class="bi bi-journals"></i>
        <span class="text">Menu</span>
        
    </div>

    <div class="date">
        <span id="date">{{ date('d M Y') }}</span>
    </div>

    <div class="categories">
        <div class="category {{ request()->is('dashboard/menu') ? 'chosen' : '' }}">
            <h3><a href="/dashboard/menu">All</a></h3>
        </div>

        <div class="category  {{ request()->is('dashboard/breakfast') ? 'chosen' : '' }}" >
            <h3><a href="/dashboard/breakfast">Breakfast</a></h3>
        </div>

        <div class="category  {{ request()->is('dashboard/lunch') ? 'chosen' : '' }}">
            <h3><a href="/dashboard/lunch">Lunch</a></h3>
        </div>

        <div class="category  {{ request()->is('dashboard/drinks') ? 'chosen' : '' }}">
            <h3><a href="/dashboard/drinks">Drink</a></h3>
        </div>
    </div>


   <h2 class="small__title"><i class={{ $icon }}></i> {{ $name }}</h2>
    
</div>

@if (Str::contains(request()->path(), 'dashboard/menu'))
    @include('UMS.dashboard.menu.OwnerMenuHome')
@endif

    @include('UMS.dashboard.menu.menuTodayPick')

    @include('UMS.dashboard.menu.menuLatestAddition')
 




@include('UMS.dashboard.menu.menuPopular')


{{-- @include('UMS.dashboard.menu.menuReview'); --}}



@endsection

