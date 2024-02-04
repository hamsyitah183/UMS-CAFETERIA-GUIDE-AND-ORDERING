@extends('UMS.dashboard.layouts.main')

<style>
    .btn a{
        border-radius: 10px;
        width: fit-content;
        padding: 0 10px;
    }

    .div {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    label .payment{
        width: 100%;
    }
</style>


@section('dash-content')
<div class="topContent">
    <div class="icon">
        <button class="btn" >
            <a href="/dashboard/payment">
                <i class="bi bi-x"></i>
                <span class="word">Back</span>
            </a>
        </button>
    </div>

</div>

<!-- content -->
<div class="content">
    <div class="editForm">
        <form action="/dashboard/media/{{ $payment->id }}" method="post">
            @method('put')
            @csrf
            <div class="div">
                <label for="payment">Social media type</label>
                <select name="paymentType" id="payment">
                    
                    @php
                        $paymentType = ['facebook', 'twitter', 'instagram', 'Others'];


                    @endphp
                    @foreach ($paymentType as $payments)
                        {{-- <option value="Cash">Cash</option>
                        <option value="Transfer">Transfer</option>
                        <option value="E-wallet">E-wallet</option>
                        <option value="Others">Others</option> --}}
                        @if (old('paymentType', $payment->paymentType) == $payments)
                            <option value="{{ $payments }}" selected>{{ $payments }}</option>
                        @else 
                            <option value="{{ $payments }}">{{ $payments }}</option>
                        @endif
                    @endforeach
                </select>

                
            </div>

            <div class="div">
                <label for="">Link</label>
                <input type="text" name="link" id="" value='{{ old('link', $payment->link) }}'>
            </div>
        

            <div class="div">
                <label for="">Name</label>
                <input type="text" name="name" id="" value='{{ old('name', $payment->name) }}'>
            </div>

           

            

            <div class="div">
                <div class="icon">
                    <button type="submit" class="btn">
                        <a href="">
                            
                            <span class="word">Update</span>
                        </a>
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection