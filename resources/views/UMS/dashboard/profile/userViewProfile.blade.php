@extends('UMS.dashboard.layouts.main')

@section('dash-content')
{{-- @dd($user) --}}
@if (session()->has('success'))
        <div class="success">
            {{ session('success') }}
            <i class="ri-close-line"></i>
        </div>
    
    @elseif (session()->has('delete'))
        <div class="success delete">
            {{ session('delete') }}
            <i class="ri-close-line"></i>
        </div>
    @endif

<div class="profileBox1">
    <div class="left">
        <div class="img">
            @php
                $imageUrl = $user->image
                    ? (Str::startsWith($user->image, ['http://', 'https://'])
                        ? $user->image
                        : asset('storage/' . $user->image))
                    : asset('path/to/placeholder-image.jpg');
            @endphp
            <img src="{{ $imageUrl }}" alt="" srcset="">
        </div>
        <a href="/dashboard/profile/{{ $user->id }}/edit"><i class="ri-edit-line"></i></a>
    </div>

    <div class="right">
        <h3 class="name">{{ $user->username }}</h3>
        <p class="role">{{ $user->role  }}</p>
    </div>
</div>


<div class="profileBox2">
<h3>Contact information:</h3>

<div class="details">
    <div class="icon">
        <i class="ri-mail-line"></i>
    </div>
    <div class="info">
        <p>{{ $user->email }}</p>
    </div>
</div>

<div class="details">
    <div class="icon">
        <i class="ri-phone-line"></i>                
    </div>
    <div class="info">
        <p>{{ $user->no_phone }}</p>
    </div>
</div>

<div class="details">
    <div class="icon">
        <i class="ri-map-pin-line"></i>                
    </div>
    <div class="info places">
        <p>{{ $user->addressLine1 }}</p>
        <p>{{ $user->addressLine2 }}</p>
        <p>{{ $user->addressLine3 }}</p>
    </div>
</div>
</div>


<div class="profileBox3">
<h3>Personal information: </h3>
    <div class="perInfo">
        <div class="row">
            <div class="col1">
                <h4>Name:</h4>
            </div>
            <div class="col2">
                <p>{{ $user->name }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col1">
                <h4>Username:</h4>
            </div>
            <div class="col2">
                <p>{{ $user->username }}</p>
            </div>
            
        </div>

        <div class="row">
            <div class="col1">
                <h4>Email:</h4>
            </div>
            <div class="col2">
                <p>{{ $user->email }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col1">
                <h4>Phone:</h4>
            </div>
            <div class="col2">
                <p>{{ $user->role }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col1">
                <h4>Role:</h4>
            </div>
            <div class="col2">
                <p>Customer</p>
            </div>
        </div>
    </div>
</div>
@endsection