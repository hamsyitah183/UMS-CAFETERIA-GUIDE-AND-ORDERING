@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<div class="overview">
    <h1 style="margin-top: 50px">Welcome back {{ auth()->user()->username }}</h1>


    <div class="title">
        <i class="ri-timer-2-line"></i>
        <span class="text">Dashboard</span>
    </div>


    @if (auth()->user()->role == 'owner')

    @include('UMS.dashboard.ownerDashboard')

    {{-- script --}}

        
    @endif
    
    

       
    </div>
</div>
@endsection