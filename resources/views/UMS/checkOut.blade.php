@extends('UMS.layout.main')

@section('container')

{{-- @dd($shopping_cart->foodOption->place_name); --}}

<style>
    .customerDetail {
        margin-top: 50px;
    }
    .customerDetail input[type="text"] {
        font-size: 15px;
        font-weight: 500;
    }

    .middle {
        margin-top: 50px;
    }
</style>

<div class="checkOut__container container">
    <div class="detail">
        <div class="logo">
            <i class="bi bi-bag"></i>
            Self pickup
        </div>

        <h1>Checkout</h1>

        <div class="box1">
            <div class="left">
                <p>Self pickup at</p>
                <p class="bold">{{ $shopping_cart->foodOption->addressLine1 }}</p>
            </div>

            <div class="right">
                @php
                    $time = $shopping_cart->pickup_time; // Assuming $time is in 24-hour format

                    // Convert 24-hour format to 12-hour format
                    $timeIn12HourFormat = date("g:i A", strtotime("$time:00"));

                    // Output the result
                    
                @endphp
                <p>Earliest pickup time</p>
                <p class="bold">{{  date("j M Y "). ', '. $timeIn12HourFormat }}</p>
            </div>
        </div>

        <div class="customerDetail">

            <form action="/order/{{ $shopping_cart->id }}" method="post">
                @method('put')
                @csrf
                <div class="top">
                    <h3>Customer details</h3>
                    <div class="form">
                        <input type="text" name="" id="" placeholder="Full name" value="{{ $shopping_cart->user->name }} " disabled>
                        <input type="text" name="" id="" placeholder="Email" value="{{ $shopping_cart->user->email }}" disabled>
                        <input type="text" name="" id="" placeholder="No Phone" value = "{{ $shopping_cart->user->no_phone }}" disabled >
                    </div>
                </div>

                <div class="middle">
                    <h3>Order notes</h3>
                    <div class="form">
                        <textarea name="order_notes" id="" cols="30" rows="10" placeholder="Notes"></textarea>

                    </div>
                </div>

                <button type="submit" hidden id="submitButton"></button>
            </form>                
        </div>
    </div>

    <div class="summary">
        <h3>Order Summary</h3>

        <div class="top">
            <div class="amount">
                <p><span class="number">{{ $shopping_cart->cart->count() }}</span> item(s)</p>
            </div>
            <div >
                <button class="btn"><a href="cart.html">Edit</a></button>
            </div>
        </div>
        {{-- @dd($shopping_cart->cart->count()) --}}
        @php
            // dd($shopping_cart->cart[0]->price);

            $subtotal = [];

            foreach ($shopping_cart->cart as $cart) {
                # code...
                $subtotal[] = $cart->price * $cart->quantity;
            }

            // dd($subtotal);
        @endphp

        <div class="bottom">
            <p><span class="title">Sub total (RM):</span><span class="number2">{{ array_sum($subtotal) }}</span></p> 
            <p><span class="title">Discount (RM):</span><span class="number2">0.00</span></p> 
            {{-- <p><span class="title">Rounding (RM):</span><span class="number2">0.02</span></p>  --}}

            <div class="total">
                <p><span class="title">Grand total (RM):</span><span>{{ array_sum($subtotal) }}</span></p> 
            </div>
        </div>
    </div>

    <div class="buttons">

        
        <button class="btn " type="submit" id='submitOutside'>Pay now ({{ array_sum($subtotal) }})</button>
    
        <script>
            var submitOutsideButton = document.getElementById('submitOutside');

            // Get the submit button inside the form
            var submitButtonInsideForm = document.getElementById('submitButton');

            // Add a click event listener to the button outside the form
            submitOutsideButton.addEventListener('click', function() {
                // Trigger the click event of the submit button inside the form
                submitButtonInsideForm.click();
            });
        </script>
       

        <button class="btn secondary"><a href="">Edit order</a></button>

    </div>
</div>

@endsection