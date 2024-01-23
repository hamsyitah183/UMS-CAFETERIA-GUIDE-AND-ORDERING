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
        <span class="text">Payment</span>
        
    </div>

    <button class="btn"><a href="/dashboard/foodOption">Back</a></button>
    
    <div class="activity">
        <button class="btn"><a href="/dashboard/payment/create"><i class="ri-add-line"></i> Add new</a></button>
    </div>

   
    
</div>

{{-- @dd($payments) --}}

<!-- content -->
@if ($payments)
@foreach ($payments as $payment)
<div class="payment flex">
    <div class="box1">
        <a href="/dashboard/payment/{{ $payment->id }}/edit">
        {{-- <h1><i class="bi bi-sticky"></i> {{ $fe->title }}<span class="feedback_id"></span></h1> --}}
            <div class="from">
                <p class="name"><span class="label">Payment </span>: {{ $payment->paymentType }}</p>
                {{-- <p class="feedback_id"><span class="label">Feedback id </span>: {{ $feedback->id }}</p>
                <p class="date"><span class="label">Date </span>: {{ $feedback->created_at }}</p> --}}
                
            </div>

            <div class="body">
                <p>
                    {{ $payment->description }}
                </p>

            </div>
        </a>
    </div>


    <div class="activity">
        <button class="btn edit"><a href="/dashboard/payment/{{ $payment->id }}/edit"><i class="ri-pencil-line"></i></a></button>
        <form action="/dashboard/payment/{{ $payment->id }}" method="post">
            @method('delete')
            @csrf
            <button class="btn delete" onclick="return confirm('Are you sure you want to delete the payment type')"><i class="ri-delete-bin-line"></i><span class="word"></span></button>
        </form>
    </div>
    
</div>
    
@endforeach

@else
<div class="body">
    
</div>


    
@endif

@endsection