<style>
    .info {
        margin-left: 30px;
    }

    .info h4 {
        margin-top: 20px;
    }
    input#close {
        margin-top: 20px;
    }
</style>

@extends('UMS.dashboard.layouts.main')

@section('dash-content')
<div class="topContent">
    <div class="icon">
        <button class="back">
            <a href="/dashboard/openingHour">
                <i class="bi bi-x"></i>
                <span class="word">Cancel</span>
            </a>
        </button>
    </div>

</div>

<!-- content -->
<div class="content">
    <div class="editForm">
        <form action="/dashboard/openingHour/{{ $openingHour->id }}" method="post">
            @method('put')
            @csrf
            <div class="div">
                <label for="title">Day</label>
                <input type="text" name="dayOfTheWeek" id="title" value="{{ $openingHour->dayOfTheWeek }}">
            </div>

            <div class="div">
                <label for="start">Start</label>
               
                    <input type="time" name="openTime" id="start" value="{{ old('openTime',$openingHour->openTime) }}" >
                    

                
            </div>

            <div class="div">
                <label for="end">End</label>
                
                    <input type="time" name="closeTime" id="start" value="{{ old('openTime',$openingHour->closeTime) }}" >
                    
                
            </div>

            <div class="div">
                <label for="close">Closed</label>

                <input type="checkbox" name="closed" id="" style="width: 20px;">Closed
            </div>

           

            

            <div class="div">
                <div class="icon">
                    <button type="submit">
                        <a href="">
                            <i class="bi bi-check"></i>
                            <span class="word">Change</span>
                        </a>
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection