@extends('UMS.dashboard.layouts.main')
<style>
    .btn {
        width: fit-content;
        padding: 0 10px;
        border-radius: 10px;
    }

    .btn a {
        color: white;
    }

    .activity {
        display: flex;
        place-content: end;
        margin-right: 30px;
    }

    .payment {
        display: flex;
        place-items: center;
        gap: 30px;
    }

    .activity {
        display: flex;
        gap: 20px;
    }

    .delete, .edit {
        background: #D32F2F;
        color: white;
        font-weight: 400;
        padding: 15px;
        height: 50px;
        font-size: 15px;
        display: flex;
        place-items: center;
        
        cursor: pointer;
    }

    .delete i, .edit i {
        font-size: 20px;
    }

    .edit {
        background: #2196F3;
    }
</style>
@section('dash-content')
<div class="overview">
    <div class="title">
        <i class="bi bi-journals"></i>
        <span class="text">Social</span>
        
    </div>

    <button class="btn"><a href="/dashboard/foodOption">Back</a></button>
    
    <div class="activity">
        <button class="btn"><a href="/dashboard/media/create"><i class="ri-add-line"></i> Add new</a></button>
    </div>

   
    
</div>

{{-- @dd($payments) --}}

<!-- content -->
@if ($payments)
@foreach ($payments as $payment)
<div class="payment flex">
    <div class="box1">
        <a href="/dashboard/media/{{ $payment->id }}/edit">
        @php
            if($payment->type == 'facebook') {
                $icon = '<i class="ri-facebook-circle-fill"></i>';
            }
            elseif($payment->type == 'twitter') {
                $icon = '<i class="ri-twitter-fill"></i>';
            }
            elseif($payment->type == 'instagram') {
                $icon = '<i class="ri-instagram-fill"></i>';
            }

            elseif($payment->type == 'Other') {
                $icon = '<i class="ri-links-line"></i>';
            }
        @endphp
        {{-- <h1><i class="bi bi-sticky"></i> {{ $fe->title }}<span class="feedback_id"></span></h1> --}}
            <div class="from">
                <p class="name"><span class="label" style="font-size: 30px"> {!! $icon !!}</span> {{ $payment->type }}</p>
                {{-- <p class="feedback_id"><span class="label">Feedback id </span>: {{ $feedback->id }}</p>
                <p class="date"><span class="label">Date </span>: {{ $feedback->created_at }}</p> --}}
                
            </div>

            <div class="body">
                <p>
                    {{ $payment->link }}
                </p>

                <p>
                    {{ $payment->name }}
                </p>

            </div>
        </a>
    </div>


    <div class="activity">
        <button class="btn edit"><a href="/dashboard/media/{{ $payment->id }}/edit"><i class="ri-pencil-line"></i></a></button>
        <form action="/dashboard/media/{{ $payment->id }}" method="post">
            @method('delete')
            @csrf
            <button class="btn delete" onclick="return confirm('Are you sure you want to delete the social media type')"><i class="ri-delete-bin-line"></i><span class="word"></span></button>
        </form>
    </div>
    
</div>
    
@endforeach

@else
<div class="body">
    
</div>


    
@endif

@endsection