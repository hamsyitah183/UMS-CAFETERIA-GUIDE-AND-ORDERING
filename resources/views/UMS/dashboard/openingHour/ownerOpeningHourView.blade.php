@extends('UMS.dashboard.layouts.main')

@section('dash-content')

<style>
    .edit .btn, .btn  {
        border-radius: 10px;
        width: fit-content;
        padding: 0 10px;
    }

    .activity .btn a, .btn a {
        color: white;
    }
</style>

<div class="topContent">
    <div class="title">
        <i class="ri-time-zone-line"></i>
        <h1 class="text">Opening Hour</h1>
    </div>

    <button class="btn"><a href="/dashboard/foodOption">Back</a></button>
</div>

<div class="midContent">
    <div class="tops">
        @php
            $todayDate = date("F j, Y");
        @endphp
        <p>
            Opening Hour 
            
        </p>
        <small class="small">{{ $todayDate }}</small>
        
    </div>

    <div class="mids">
        @foreach ($openHours->openingHour as $openingHour)
        @php
            
        @endphp
        <div class="item">
            <div class="day">
                <h3>{{ $openingHour->dayOfTheWeek }}</h3>
                <div class="edit">
                    <a href="/dashboard/openingHour/{{ $openingHour->id }}/edit"><i class="ri-pencil-line"></i></a>
                </div>
            </div>
            <div class="hour">
                @if ($openingHour->openTime != NULL || $openingHour->closeTime != NULL)
                    <p style="text-align: center"><span class="open" >{{ $openingHour->openTime }} AM</span> until <span class="close">{{ $openingHour->closeTime }} PM</span></p>
                @else
                    <p class="open" style="text-align: center">Closed</p>
                @endif
                
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection